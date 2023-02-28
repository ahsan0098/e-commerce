<?php

namespace App\Http\Livewire;

use App\Models\sale;
use App\Models\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $data = 'test';
    public $name;
    public $email;
    public $address;
    public $phone;
    public $country;
    public $zip;
    public $city;
    public $card_number;
    public $expiry_month;
    public $expiry_year;
    public $cvc;
    public $invoiceItem;
    public $toggler = false;
    protected $listeners = ['stripePay' => 'stripePay'];
    public function mount()
    {
        $user = User::where('id', session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))->first();
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function confirmPayment()
    {
        $this->toggler = true;
        $this->dispatchBrowserEvent('swal:confirmpay', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'showCancelButton' => true,
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'confirmButtonText' => 'Yes, Confirmed',
        ]);
    }
    public function stripePay()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'card_number' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvc' => 'required',
        ]);
        $stripe = Stripe::make(env('STRIPE_SECRET_KEY'));

        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $data['card_number'],
                    'exp_month' => $data['expiry_month'],
                    'exp_year' => $data['expiry_year'],
                    'cvc' => $data['cvc'],
                ]
            ]);
            if (!isset($token['id'])) {
                $this->dispatchBrowserEvent('swal:message', [
                    'text' => 'token genneration failed',
                ]);
                $this->toggler = false;
            }
            $customer = $stripe->customers()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => [
                    'line1' => $data['address'],
                    'postal_code' => $data['zip'],
                    'city' => $data['city'],
                    'country' => $data['country'],
                ],

                'source' => $token['id'],
            ]);
            $charge = $stripe->charges()->create([
                'customer' => $customer['id'],
                'currency' => 'USD',
                'amount' => Cart::total(),
                'description' => 'payment for' . $token['id'],
            ]);
            if ($charge['status'] == "succeeded") {
                $address = '';
                $this->invoiceItem = $stripe->invoiceItems()->create($customer['id'], [
                    'amount'   => Cart::total(),
                    'currency' => 'USD',
                    'metadata' => [
                        'name' => $customer['name'],
                        'email' => $customer['email'],
                        'phone' => $customer['phone'],
                        'address' => implode(',', $customer['address']),
                        'card_no' => $data['card_number'],
                        'exp_month' => $data['expiry_month'],
                        'exp_year' => $data['expiry_year'],
                        'cvc' => 'checked',
                    ]
                ]);
                session()->put('invoice', $this->invoiceItem['id']);
                $item_name = "";
                $item_qty = 0;
                foreach (Cart::content() as $item) {
                    $item_name = $item_name . $item->name . ",";
                    $item_qty = $item_qty + $item->qty;
                }
                $sale = new sale;
                $sale->items = $item_name;
                $sale->customer_id = session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
                $sale->bill = Cart::total();
                $sale->item_quantity = $item_qty;
                $sale->purchase_status = true;
                $sale->invoice_id = $this->invoiceItem['id'];
                $sale->save();
                $this->dispatchBrowserEvent('swal:success', [
                    'text' => "Payment is succeeded"
                ]);
                $this->toggler =
                    false;
                // Cart::destroy();
            }
            if ($charge['status'] == "failed") {
                foreach (Cart::content() as $item) {
                    $sale = new sale;
                    $sale->item_id = $item->id;
                    $sale->customer_id = session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
                    $sale->bill = $item->subtotal + ($item->qty * $item->tax);
                    $sale->item_quantity = $item->qty;
                    $sale->purchase_status = false;
                    $sale->item_quantity = $item->qty;
                    $sale->save();
                }
                $this->dispatchBrowserEvent('swal:success', [
                    'text' => "Payment is succeeded"
                ]);
                $this->toggler = false;
            }
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('swal:message', [
                'text' => $e->getMessage(),
            ]);
            $this->toggler = false;
        }
    }
    public function render()
    {
        return view('livewire.checkout-component')->layout("layouts.base");
    }
}

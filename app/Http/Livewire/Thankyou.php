<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class Thankyou extends Component
{
    public $invoice;
    public function mount()
    {
        $stripe = Stripe::make(env('STRIPE_SECRET_KEY'));
        $this->invoice =
            $stripe->invoiceItems()->find(session()->get('invoice'));
        // session()->forget('invoice');
        // Cart::destroy();
    }
    public function generatePdf()
    {
        // $this->dispatchBrowserEvent('swal:message', [
        //     'text' => 'testing'
        // ]);

        // $pdf = PDF::loadView('livewire.invoice-component', $data);
        // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');
        set_time_limit(300);
        $pdf = PDF::loadView('livewire.invoice-component', ['invoice' => $this->invoice])->set_option('isHtml5ParserEnabled', true)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "filename.pdf"
        );
    }
    public function render()
    {
        return view('livewire.thankyou')->layout('layouts.base');
    }
}

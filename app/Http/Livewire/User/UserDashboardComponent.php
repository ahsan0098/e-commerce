<?php

namespace App\Http\Livewire\User;

use App\Models\sale;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public $data;
    public $test = 'something';
    public function mount()
    {
        $this->data = sale::all();
    }
    public function loadData($filter = '')
    {
        $this->test = $filter;
        // if ($filter == '') {
        //     $this->data = sale::all();
        // }
        // if ($filter == 'success') {
        //     $this->data = sale::where('purchase_status', 1)->get();
        // }
        // if ($filter == 'fail') {
        //     $this->data = sale::where('purchase_status', 0)->get();
        // }
        // if ($filter == 'deliver') {
        //     $this->data = sale::where('delivery_status', 0)->get();
        // }
    }
    public function toInvoice($id)
    {
        session()->put('item_invoice', $id);
        return redirect('invoice');
    }
    public function render()
    {
        $total = sale::where('customer_id', session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))->count();
        $success = sale::where('customer_id', session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))->where('purchase_status', true)->count();
        $failed = sale::where('customer_id', session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))->where('purchase_status', false)->count();
        return view('livewire.user.user-dashboard-component', ['total' => $total, 'success' => $success, 'failed' => $failed])->layout('layouts.base');
    }
}

<div>
    <main id="main" class="main-site d-print-none">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Thank You</span></li>
                </ul>
            </div>
        </div>

        <div class="container pb-60">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Thank you for your order</h2>
                    <a href="/shop" class="btn btn-submit btn-submitx">Continue Shopping</a>
                </div>
            </div>
        </div>
        <!--end container-->
    </main>
    <div class="container download" style="padding-left: 200px;">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-8">
                <span class="text-primary" style="font-size: 2.5rem;">Payment Invoice</span>
                <div style="text-align: end;"><a id="canvas" href="" style="font-size: 2.5rem;">Download PDF<i
                            class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                </div>
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding" id="invoice">
                    <div class="card">
                        <div class="card-header p-4">
                            <h3 class="mb-0">Invoice No : {{ $invoice['id'] }}</h3>
                            Date: 12 Jun,2019
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h5 class="mb-3">From:</h5>
                                    <h3 class="text-dark mb-1">Surfside Media</h3>
                                    <div>Shamsabad,Rawalpindi</div>
                                    <div>Email: sheikhahsanali98@gmail.com</div>
                                    <div>Phone: +91 9897 989 989</div>
                                </div>
                                <div class="col-sm-6 ">
                                    <h5 class="mb-3">To:</h5>
                                    <h3 class="text-dark mb-1">{{ $invoice['metadata']['name'] }}</h3>
                                    <div>{{ $invoice['metadata']['address'] }}</div>
                                    <div>Email: {{ $invoice['metadata']['email'] }}</div>
                                    <div>Phone: {{ $invoice['metadata']['phone'] }}</div>
                                    <div>Customer id: {{ $invoice['customer'] }}</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <div>
                                    @php
                                        $i = 0;
                                    @endphp
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th class="right">Price</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td class="center">{{ ++$i }}</td>
                                                    <td class="left">
                                                        <figure><img
                                                                src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                                                alt="{{ $item->name }}" width="100" height="70">
                                                        </figure>
                                                    </td>
                                                    <td class="left strong">{{ $item->name }}</td>
                                                    <td class="right">${{ $item->model->regular_price }}</td>
                                                    <td class="center">${{ $item->qty }}</td>
                                                    <td class="right">
                                                        ${{ $item->model->regular_price * $item->qty + $item->tax }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Subtotal</strong>
                                                </td>
                                                <td class="right">${{ Cart::subtotal() }}</td>
                                            </tr>
                                            {{-- <tr>
                                        <td class="left">
                                            <strong class="text-dark">Discount (20%)</strong>
                                        </td>
                                        <td class="right">${{ cart::discount() }}</td>
                                    </tr> --}}
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Tax</strong>
                                                </td>
                                                <td class="right">${{ Cart::tax() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark">${{ Cart::total() }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card-footer bg-white">
                    <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--main area-->
    <div id="capture" style="padding: 10px; background: #f5da55">
        <h4 style="color: #000; ">Hello world!</h4>
    </div>
</div>

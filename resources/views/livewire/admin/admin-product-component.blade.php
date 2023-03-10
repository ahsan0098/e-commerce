<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        tr {
            item-align: center;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6" style="font-size: 18px; font-weight:bold;">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.product.addproducts') }}"
                                    class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        {{-- @if (Session::has('message'))
                            <div class="text-center alet alert-success" style="font-size: 18px; font-weight:bold;"
                                role="alert">{{ Session::get('message') }}</div>
                        @endif --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                                alt="{{ $product->name }}" width="60">
                                        </td>
                                        <td style="font-size: 18px">{{ $product->name }}</td>

                                        <td style="font-size: 18px">{{ $product->stock_status }}</td>
                                        <td style="font-size: 18px">{{ $product->regular_price }}</td>
                                        <td style="font-size: 18px">{{ $product->category_id }}</td>
                                        <td style="font-size: 18px">{{ $product->created_at }}</td>
                                        <td><a
                                                href="{{ route('admin.product.editproducts', ['id' => $product->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>&nbsp;&nbsp;&nbsp;<a href=""
                                                wire:click.prevent="deleteproduct({{ $product->id }})"><i
                                                    class="fa fa-trash fa-2x text-danger"></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

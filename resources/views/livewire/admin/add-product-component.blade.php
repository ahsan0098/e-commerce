<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6" style="font-size: 18px; font-weight:bold;">
                                ADD Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All
                                    Products</a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="text-center alet alert-success" style="font-size: 18px; font-weight:bold;"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">

                        <form action="" class="form-horizontal" wire:submit.prevent="addproduct">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" required name="name" id="name"
                                        class="form-control input-md" placeholder="product Name" wire:model="name"
                                        wire:keyup="generateslug" />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" required name="slug" id="slug"
                                        class="form-control input-md" placeholder="product-slug" wire:model="slug" />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" required name="image" id="image"
                                        class="form-control input-md" placeholder="Product Image" wire:model="image" />
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" required name="regular_price" id="regular_price"
                                        class="form-control input-md" placeholder="product regular_price"
                                        wire:model="regular_price" />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" required name="sale_price" id="sale_price"
                                        class="form-control input-md" placeholder="product sale_price"
                                        wire:model="sale_price" />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product stock status</label>
                                <div class="col-md-4">
                                    <select type="text" required name="stock_status" id="stock_status"
                                        class="form-control input-md" placeholder="product stock_status"
                                        wire:model="stock_status">
                                        <option value="Instock" selected>Instock</option>
                                        <option value="Outofstock">Outofstock</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product featured</label>
                                <div class="col-md-4">
                                    <select type="text" required name="featured" id="featured"
                                        class="form-control input-md" placeholder="product featured"
                                        wire:model="featured">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product category</label>
                                <div class="col-md-4">
                                    <select type="text" required name="category" id="category"
                                        class="form-control input-md" wire:model="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" required name="description" id="description" class="form-control input-md"
                                        wire:model="description" placeholder="Product description"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product short Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" required name="short_description" id="short_description" class="form-control input-md"
                                        wire:model="short_description" placeholder="Product short_description"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product SKU</label>
                                <div class="col-md-4">
                                    <input type="text" required name="SKU" id="SKU"
                                        class="form-control input-md" wire:model="SKU" placeholder="Product SKU" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" required name="quantity" id="quantity"
                                        class="form-control input-md" wire:model="quantity"
                                        placeholder="Product quantity" />

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

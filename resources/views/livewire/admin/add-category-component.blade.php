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
                                ADD Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All
                                    Categories</a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="text-center alet alert-success" style="font-size: 18px; font-weight:bold;"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">

                        <form action="" class="form-horizontal" wire:submit.prevent="addcategory">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="name" id="name" class="form-control input-md"
                                        placeholder="Category Name" wire:model="name" wire:keyup="generateslug" />
                                    @if (Session::has('nameerr'))
                                        <small class="alet alert-danger" role="alert">{{ Session::get('nameerr') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" name="slug" id="slug" class="form-control input-md"
                                        placeholder="Category-slug" wire:model="slug" />
                                    @if (Session::has('slugerr'))
                                        <small class="alet alert-danger" role="alert">{{ Session::get('slugerr') }}
                                        </small>
                                    @endif
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

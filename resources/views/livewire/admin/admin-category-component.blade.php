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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories.addcategories') }}"
                                    class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="text-center alet alert-success" style="font-size: 18px; font-weight:bold;"
                                role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td><a
                                                href="{{ route('admin.categories.editcategories', ['id' => $category->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>&nbsp;&nbsp;&nbsp;<a href=""
                                                wire:click.prevent="deletecategory({{ $category->id }})"><i
                                                    class="fa fa-trash fa-2x text-danger"></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

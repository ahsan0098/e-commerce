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
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Add New
                                    Slide</a>
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
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                    <tr>
                                        <td>{{ $slide->id }}</td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->subtitle }}</td>
                                        <td>{{ $slide->price }}</td>
                                        <td>{{ $slide->link }}</td>
                                        <td>{{ $slide->status }}</td>
                                        <td>{{ $slide->created_at }}</td>
                                        <td><a href="{{ route('admin.edithomeslider', ['id' => $slide->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="" wire:click.prevent="deleteslide({{ $slide->id }})"><i
                                                    class="fa fa-trash fa-2x text-danger"></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $slides->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

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
                                ADD slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">All
                                    Slides</a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="text-center alet alert-success" style="font-size: 18px; font-weight:bold;"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">

                        <form wire:submit.prevent="addslide" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide Titile</label>
                                <div class="col-md-4">
                                    <input type="text" name="title" id="title" class="form-control input-md"
                                        placeholder="slide Title" wire:model="title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" name="subtitle" id="subtitle" class="form-control input-md"
                                        placeholder="slide Subtitle" wire:model="subtitle" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide price</label>
                                <div class="col-md-4">
                                    <input type="text" name="price" id="price" class="form-control input-md"
                                        placeholder="slide price" wire:model="price" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide Link</label>
                                <div class="col-md-4">
                                    <input type="text" name="link" id="link" class="form-control input-md"
                                        placeholder="slide Link" wire:model="link" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide Status</label>
                                <div class="col-md-4">
                                    <select name="status" id="status" class="form-control input-md"
                                        wire:modal="status">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">slide image</label>
                                <div class="col-md-4">
                                    <input type="file" wire:modal="image" class="form-control input-md" />
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

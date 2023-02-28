<div class="content">
    <style>
        .content {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }

        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }

        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }

        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }

        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }

        body {
            width: 100% !important;
        }
    </style>
    <div class="container">
        {{-- @php
            print_r($success);
        @endphp --}}
        {{ $test }}
        <div class="row" wire:click.prevent="loadData()">
            <div class="col-md-3 col-sm-6">
                <a href="">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Total Purchases</span>
                                <span class="icon-stat-value">{{ $total }}</span>
                            </div>
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="" wire:click.prevent="loadData('success')">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Purchases Succeeded</span>
                                <span class="icon-stat-value">{{ $success }}</span>
                            </div>
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="" wire:click.prevent="loadData('fail')">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Purchases Failed</span>
                                <span class="icon-stat-value">{{ $failed }}</span>
                            </div>
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="" wire:click.prevent="loadData('deliver')">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Order delivered</span>
                                <span class="icon-stat-value">0</span>
                            </div>
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div>
    @php
        $i = 0;
    @endphp
</div>
<div class="container" style="margin-left: 150px" wire:poll>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-lg-10">

            {{-- <div class="bg-success" style="color: black; padding:15px;">
                <h2>order Details</h2>
            </div> --}}
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr class="bg-success">
                        <th>#</th>
                        <th>Items quantity</th>
                        <th>Total bill</th>
                        <th>Date</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <div>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $dt['item_quantity'] }}</td>
                                <td>{{ $dt['bill'] }}</td>
                                <td>{{ $dt['created_at'] }}</td>
                                <td><a href="" class="btn btn-primary"
                                        wire:click.prevent="toInvoice('{{ $dt['invoice_id'] }}')">Invoice</a></td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

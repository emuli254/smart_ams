@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | ' . $item->name . ' Stocks' , 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Items')

@section('content_header')
    <h1>Item Stocks</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Item Stocks for {{ $item->name }}
                    <a href="{{ route('item.stocks.create', $item->id) }}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"> </i> New Item Stock </a>
                    <a href="{{ route('items.index', $item->id) }}" class="btn btn-default pull-right mx-2"> <i class="fa fa-arrow-left"> </i> Back to Item Master </a>
                </h3>
            </div>

            <div class="box-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Item Specs/Description </th>
                            <th>Item Serial</th>
                            <th>Asset Tag</th>
                            <th>Supplier</th>
                            <th>Buy-in price</th>
                            <th>Instock</th>
                            <th>Discontinued</th>
                            <th class="text-right"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($itemstocks as $itemstock)
                            <tr>
                                <td>{{$itemstock->id}}</td>
                                <td>{{$itemstock->description}}</td>
                                <td>{{$itemstock->serial_part_no}}</td>
                                <td>{{$itemstock->asset_tag_no}}</td>
                                <td>{{$itemstock->is_supplied_by->name }}</td>

                                <td>{{$itemstock->buy_price}}</td>
                                <td>
                                    @if ($itemstock->in_stock == 1) Yes @else No @endif
                                </td>
                                <td>
                                    @if ($itemstock->discontinued == 1) Yes @else No @endif
                                </td>

                                <td>
                                    <a href="{{ route('item-stocks.edit', $itemstock->id) }}" class="btn btn-default mx-2"> <i class="fa fa-pencil"> </i> Edit</a>

                                    @if ( $itemstock->is_issued_to == null )
                                        <a href="{{ route('itemstock.issuance.create', $itemstock) }}" class="btn btn-primary mx-2"> <i class="fa fa-user-circle"> </i> Issue</a>
                                    @else
                                        <a href="{{ route('itemstock.issuance.create', $itemstock) }}" class="btn btn-primary disabled mx-2"> <i class="fa fa-check-circle"> </i> Issue</a>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>

@endsection

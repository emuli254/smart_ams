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
                            <th>Location</th>
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
                                <td> @if ( $itemstock->is_located_at()->exists() )  {{ $itemstock->is_located_at->name }} @else <i class=""> N/A </i> @endif </td>

                                <td>
                                    @if ($itemstock->discontinued == 1) Yes @else No @endif
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('item-stocks.edit', $itemstock->id) }}" class="btn btn-default mx-2"> <i class="fa fa-pencil"> </i> Edit</a>

                                        @if ( $itemstock->is_issued_to == null || $itemstock->is_available($itemstock->id) == 1 )
                                            <a href="{{ route('itemstock.issuance.create', $itemstock) }}" class="btn btn-primary mx-2"> <i class="fa fa-user-circle"> </i> Issue</a>

                                        @elseif ( $itemstock->is_issued_to != null )

                                            {!! Form::model( $itemstock, ['route' => ['itemstock.return', $itemstock->id], 'method' => 'POST' ]) !!}
                                                @csrf
                                                <input type="hidden" name="item_id" id="item_id" value="{{ $itemstock->item_id }}">
                                                <input type="hidden" name="itemstock_id" id="itemstock_id" value="{{ $itemstock->id }}">
                                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="staff_id" id="staff_id" value="{{ $itemstock->is_issued_to->staff_id }}">
                                                <input type="hidden" name="location_id" id="location_id" value="{{ $itemstock->office_location_id }}">

                                                <button class="btn btn-primary mx-1"> <i class="fa fa-reply"></i> Return </button>
                                            {{-- {{ Form::submit('Return', ['class' => 'btn btn-primary mx-2']) }} --}}
                                            {!! Form::close() !!}

                                        @endif

                                        <a href="{{ route('itemstock.move', $itemstock->id) }}" class="btn btn-success mx-2"> <i class="fa fa-map-pin"> </i> Move </a>

                                    </div>
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

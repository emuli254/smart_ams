@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | ' . $product->name . ' Stocks' , 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Products')

@section('content_header')
    <h1>Product Stocks</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Product Stocks for {{ $product->name }}
                    <a href="{{ route('product.stocks.create', $product->id) }}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"> </i> New Product Stock </a>
                    <a href="{{ route('products.index', $product->id) }}" class="btn btn-default pull-right mx-2"> <i class="fa fa-arrow-left"> </i> Back to Product Master </a>
                </h3>
            </div>

            <div class="box-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Product Specs/Description </th>
                            <th>Product Serial</th>
                            <th>Asset Tag</th>
                            <th>Supplier</th>
                            <th>Buy-in price</th>
                            <th>Instock</th>
                            <th>Discontinued</th>
                            <th class="text-right"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($productstocks as $productstock)
                            <tr>
                                <td>{{$productstock->id}}</td>
                                <td>{{$productstock->description}}</td>
                                <td>{{$productstock->serial_part_no}}</td>
                                <td>{{$productstock->asset_tag_no}}</td>
                                <td>{{$productstock->is_supplied_by->name }}</td>

                                <td>{{$productstock->buy_price}}</td>
                                <td>
                                    @if ($productstock->in_stock == 1) Yes @else No @endif
                                </td>
                                <td>
                                    @if ($productstock->discontinued == 1) Yes @else No @endif
                                </td>

                                <td>
                                    <a href="{{ route('product-stocks.edit', $productstock->id) }}" class="btn btn-default mx-2"> <i class="fa fa-pencil"> </i> Edit</a>

                                    @if ( $productstock->is_issued_to == null )
                                        <a href="{{ route('productstock.issuance.create', $productstock) }}" class="btn btn-primary mx-2"> <i class="fa fa-user-circle"> </i> Issue</a>
                                    @else
                                        <a href="{{ route('productstock.issuance.create', $productstock) }}" class="btn btn-primary disabled mx-2"> <i class="fa fa-check-circle"> </i> Issue</a>
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

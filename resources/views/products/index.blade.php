@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'All Products', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Products
                    <a href="{{ route('products.create') }}" class="btn btn-success pull-right"> New Product </a>
                </h3>
            </div>

            <div class="box-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>Buy-in price</th>
                            <th>Instock</th>
                            <th>Discontinued</th>
                            <th class="text-right"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->buy_price}}</td>
                                <td>
                                    @if ($product->instock == 1) Yes @else No @endif
                                </td>
                                <td>
                                    @if ($product->discontinued == 1) Yes @else No @endif
                                </td>
                                <td>

                                    @if ( $product->is_issued_to == null )
                                        <a href="{{ route('product.issuance.create', $product) }}" class="btn btn-primary pull-right mx-2">Issue</a>
                                    @else
                                        <a href="{{ route('product.issuance.create', $product) }}" class="btn btn-primary pull-right disabled mx-2">Issue</a>
                                    @endif

                                    <a href="/products/{{$product->id}}/edit" class="btn btn-secondary pull-right mx-2"> Stocks </a>
                                    <a href="/products/{{$product->id}}/edit" class="btn btn-default pull-right mx-2">Edit</a>

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

@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Product Master', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Product Master
                    <a href="{{ route('products.create') }}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"> </i> New Product </a>
                </h3>
            </div>

            <div class="box-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Product Category </th>
                            <th>Product Name</th>
                            <th class="text-right"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <a href="/products/{{$product->id}}/edit" class="btn btn-outline"> <i class="fa fa-pencil"> </i> Edit</a>
                                    <a href="{{ route('product-stocks.show', $product->id ) }}" class="btn btn-primary mx-2"> Stocks <span class="badge-pill badge-info"> {{ $product->stock->count() }} </span> </a>
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

@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Item Master', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Items')

@section('content_header')
    <h1>Items</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Item Master
                    <a href="{{ route('items.create') }}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"> </i> New Item </a>
                </h3>
            </div>

            <div class="box-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Item Category </th>
                            <th>Item Name</th>
                            <th class="text-right"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{ route('items.edit', $item->id ) }}" class="btn btn-outline"> <i class="fa fa-pencil"> </i> Edit</a>
                                    <a href="{{ route('item-stocks.show', $item->id ) }}" class="btn btn-primary mx-2"> Stocks <span class="badge-pill badge-info"> {{ $item->stock->count() }} </span> </a>
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

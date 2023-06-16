@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Item Categories', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Item Categories')

@section('content_header')
    <h1>Item categories</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Item categories
                        <a href="{{ route('item-categories.create') }}" class="btn btn-success pull-right"> New Item Category </a>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category name</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="/item-categories/{{$category->id}}">{{$category->name}}</a></td>
                                    <td><a href="/item-categories/{{$category->id}}/edit" class="btn btn-default">Edit</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection

{{--
@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP Asset Management System by Erick Muli', 'navName' => 'Dashboard', 'activeButton' => 'laravel']) --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Edit Item', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])


@section('title', 'Edit item {{$item->name}}')

@section('content_header')
    <h1>Edit item {{$item->name}}</h1>
@stop

@section('content')

@include('includes.messages')


    <div class="col-sm-12">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Edit item {{$item->name}}</h3>
            </div>

            <div class="box-body">
                {{-- {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'post']) !!} --}}
                {!! Form::model( $item, ['route' => ['items.update', $item->id], 'method' => 'POST' ]) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Item name') }}
                            {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Item name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    {{Form::label('item_category_id', 'Item category')}}
                    {{Form::select('item_category_id', $categories->pluck('name', 'id'), $item->category_id, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => '-- Please Select --'])}}
                    <p>Is the category you're looking for not in this list? Create it <a target="_blank" href="/item-categories/create">here</a>.</p>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Save changes', ['class' => 'btn btn-default pull-right']) }}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('js')
  <script src="{{asset('js/render_select2.js')}}" charset="utf-8"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="{{asset('js/render_ckeditor.js')}}" charset="utf-8"></script>
@endsection

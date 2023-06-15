{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Create Product', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New product')

@section('content_header')
    <h1>New product</h1>
@stop

@section('content')

@include('includes.messages')

    {{-- @include('alerts.errors') --}}

    <div class="col-sm-12">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">New product</h3>
            </div>
            <div class="box-body">
                {!! Form::open( array( 'route' => 'products.store' , 'method' => 'POST' )) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Product name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                    {{Form::label('product_category_id', 'Product category')}}
                    {{Form::select('product_category_id', $categories->pluck('name', 'id'), null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => '-- Please Select --'])}}
                    <p>Is the category you're looking for not in this list? Create it <a target="_blank" href="/product-categories/create">here</a>.</p>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {{ Form::submit('Create product', ['class' => 'pull-right btn btn-default']) }}
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

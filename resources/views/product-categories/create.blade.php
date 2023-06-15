{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Create Product Category', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New Product Category')

@section('content_header')
    <h1>New Product Category</h1>
@stop

@section('content')

<div class="">

    @include('includes.messages')

</div>

    <div class="">
        <div class="col-sm-12">
            <div class="box box-danger">

                <div class="box-header with-border">
                    <h3 class="box-title">New Product Category</h3>
                </div>

                <div class="box-body">
                    {!! Form::open( array( 'route' => 'product-categories.store' , 'method' => 'POST' )) !!}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('name', 'Product category name') }}
                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product category name']) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::submit('Create Product Category', ['class' => 'pull-right btn btn-default']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Create Item Category', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New Item Category')

@section('content_header')
    <h1>New Item Category</h1>
@stop

@section('content')

<div class="">

    @include('includes.messages')

</div>

    <div class="col-sm-12">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">New Item Category</h3>
            </div>

            <div class="box-body">
                {!! Form::open( array( 'route' => 'item-categories.store' , 'method' => 'POST' )) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Item category name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Item category name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    {{ Form::submit('Create Item Category', ['class' => 'pull-right btn btn-default']) }}
                    {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Edit Item Category', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Edit item category {{$category->name}}')

@section('content_header')
    <h1>Edit item category {{$category->name}}</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Edit item category {{$category->name}}</h3>
            </div>
            <div class="box-body">
                {!! Form::model( $category, ['route' => ['item-categories.update', $category->id], 'method' => 'POST' ]) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Item category name') }}
                            {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Item category name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Save changes', ['class' => 'pull-right btn btn-default']) }}
                    {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

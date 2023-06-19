{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Edit Office Location', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Edit Office location')

@section('content_header')
    <h1>Edit location {{$location->name}}</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Office location {{$location->name}}</h3>
            </div>
            <div class="box-body">

                {!! Form::model( $location, ['route' => ['office-locations.update', $location->id], 'method' => 'POST' ]) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Office location name') }}
                            {{ Form::text('name', $location->name, ['class' => 'form-control', 'placeholder' => 'Office location name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                    <div class="form-group">
                        {{ Form::label('county', 'County') }}
                        {{ Form::text('county', $location->county, ['class' => 'form-control', 'placeholder' => 'County Name']) }}
                    </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                        {{ Form::label('subcounty', 'Sub County') }}
                        {{ Form::text('subcounty', $location->subcounty, ['class' => 'form-control', 'placeholder' => 'Sub County']) }}
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::label('street', 'Street / Road') }}
                        {{ Form::text('street', $location->street, ['class' => 'form-control', 'placeholder' => 'Street / Road']) }}
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('building', 'Building') }}
                        {{ Form::text('building', $location->building, ['class' => 'form-control', 'placeholder' => 'Building']) }}
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('office_code', 'Office Code') }}
                        {{ Form::text('office_code', $location->office_code, ['class' => 'form-control', 'placeholder' => 'Office Code']) }}
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Save changes', ['class' => 'pull-right btn btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

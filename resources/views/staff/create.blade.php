{{-- @extends('adminlte::page') --}}
{{-- @extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP Asset Management System by Erick Muli', 'navName' => 'Dashboard', 'activeButton' => 'laravel']) --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'ODPP AMS | New Staff', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New staff')

@section('content_header')
    <h1>New staff</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">New staff</h3>
            </div>

            <div class="box-body">
                {!! Form::open( array( 'route' => 'staff.store' , 'method' => 'POST' )) !!}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'staff name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'staff name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'Email address') }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email address']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone number') }}
                            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone number']) }}
                        </div>
                    </div>
                </div>

            <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                {{ Form::label('personal_number', 'Personal Number') }}
                {{ Form::text('personal_number', '', ['class' => 'form-control', 'placeholder' => 'Personal Number']) }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                {{ Form::label('national_id_number', 'National ID Number') }}
                {{ Form::text('national_id_number', '', ['class' => 'form-control', 'placeholder' => 'National ID Number']) }}
                </div>
            </div>
            </div>

            <div class="row">

            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                    {{ Form::label('department', 'Department') }}
                    {{ Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Department']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    {{ Form::label('division', 'Division / Unit') }}
                    {{ Form::text('division', '', ['class' => 'form-control', 'placeholder' => 'Division or Unit']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                    {{ Form::label('designation', 'Designation') }}
                    {{ Form::text('designation', '', ['class' => 'form-control', 'placeholder' => 'Designation']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                {{ Form::submit('Create staff', ['class' => 'pull-right btn btn-default']) }}
                {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>


@stop

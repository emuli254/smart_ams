{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Edit Staff', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])
{{-- @extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP Asset Management System by Erick Muli', 'navName' => 'Dashboard', 'activeButton' => 'laravel']) --}}

@section('title', 'Edit Staff' )

@section('content_header')
    <h1>Edit Staff {{$staff->name}}</h1>
@stop

@section('content')
	@include('includes.messages')

    <div class="row">

        <div class="card col-md-12">

            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h3 class="box-title">Edit Staff {{$staff->name}}</h3>
                    </div>
                </div>
            </div>

                {{-- <div class="col-sm-12"> --}}
                {{-- <div class="box box-danger"> --}}
                {{-- <div class="box-header with-border">
                    <h3 class="box-title">Edit Staff {{$staff->name}}</h3>
                    </div> --}}
            <div class="card-body">
                {!! Form::model( $staff, ['route' => ['staff.update', $staff->id], 'method' => 'POST' ]) !!}
                {{-- {!! Form::open( array( ['route' => 'staff.update', $staff->id ], 'method' => 'post') ) !!} --}}
                {{-- {!! Form::open(['action' => ['StaffController@update', $staff->id], 'method' => 'post']) !!} --}}
                {{-- Form::open(array('route' => 'profile.store', 'method' => 'POST', 'class' => 'row' )) --}}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Staff name') }}
                            {{ Form::text('name', $staff->name, ['class' => 'form-control', 'placeholder' => 'Staff name']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'Email address') }}
                            {{ Form::text('email', $staff->email, ['class' => 'form-control', 'placeholder' => 'Email address']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone number') }}
                            {{ Form::text('phone', $staff->phone, ['class' => 'form-control', 'placeholder' => 'Phone number']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                    {{ Form::label('personal_number', 'Personal Number') }}
                    {{ Form::text('personal_number', $staff->personal_number, ['class' => 'form-control', 'placeholder' => 'Personal Number']) }}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                    {{ Form::label('national_id_number', 'National ID number') }}
                    {{ Form::text('national_id_number', $staff->national_id_number, ['class' => 'form-control', 'placeholder' => 'National ID number']) }}
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    {{ Form::label('department', 'Department') }}
                    {{ Form::text('department', $staff->department, ['class' => 'form-control', 'placeholder' => 'Department']) }}
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    {{ Form::label('division', 'Division / Unit') }}
                    {{ Form::text('division', $staff->division, ['class' => 'form-control', 'placeholder' => 'Division / Unit']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    {{ Form::label('designation', 'Designation') }}
                    {{ Form::text('designation', $staff->designation, ['class' => 'form-control', 'placeholder' => 'Designation']) }}
                    </div>
                </div>
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Save changes', ['class' => 'pull-right btn btn-default']) }}

                {!! Form::close() !!}
            </div>
				{{-- </div> --}}
			{{-- </div> --}}
        </div>
    </div>
@stop


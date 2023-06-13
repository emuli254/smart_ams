{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'New Supplier', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New supplier')

@section('content_header')
    <h1>New supplier</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">New supplier</h3>
					</div>
					<div class="box-body">
						{!! Form::open( array( 'route' => 'suppliers.store' , 'method' => 'POST' )) !!}

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{ Form::label('name', 'Supplier name') }}
									{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Supplier name']) }}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{ Form::label('website', 'Supplier website') }}
									{{ Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Supplier website']) }}
								</div>
							</div>
						</div>

						{{ Form::submit('Create supplier', ['class' => 'pull-right btn btn-default']) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
    </div>
@stop

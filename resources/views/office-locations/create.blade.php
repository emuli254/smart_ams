@extends('adminlte::page')

@section('title', 'New Office Location')

@section('content_header')
    <h1>New Office Location</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">New Office Location</h3>
					</div>
					<div class="box-body">
						{!! Form::open(['action' => 'OfficeLocationsController@store', 'method' => 'post']) !!}

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{ Form::label('name', 'Office Location name') }}
									{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Office Location name']) }}
								</div>
							</div>
						</div>

            <div class="row">
              <div class="col-sm-10">
                <div class="form-group">
                  {{ Form::label('county', 'County') }}
                  {{ Form::text('county', '', ['class' => 'form-control', 'placeholder' => 'County']) }}
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  {{ Form::label('subcounty', 'Sub County') }}
                  {{ Form::text('subcounty', '', ['class' => 'form-control', 'placeholder' => 'Sub County']) }}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  {{ Form::label('street', 'Street / Road') }}
                  {{ Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Street / Road']) }}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  {{ Form::label('building', 'Building') }}
                  {{ Form::text('building', '', ['class' => 'form-control', 'placeholder' => 'Building']) }}
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  {{ Form::label('office_code', 'Office Code') }}
                  {{ Form::text('office_code', '', ['class' => 'form-control', 'placeholder' => 'Office Code']) }}
                </div>
              </div>
            </div>

						{{ Form::submit('Create Office Location', ['class' => 'pull-right btn btn-default']) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
    </div>
@stop

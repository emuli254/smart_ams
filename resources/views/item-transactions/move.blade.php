{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Move Item', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New item')

@section('content_header')
    <h1> Move item </h1>
@stop

@section('content')
	@include('includes.messages')
    {{-- @include('alerts.errors') --}}
    <div class="row">

        <div class="card col-md-12">

            <div class="card-header">
                <div class="box-header with-border">
                    <h3 class="box-title">Move item {{ $itemstock->item->name }}</h3>
                </div>

                <div class="card-body">
                    {!! Form::open( array( 'route' => 'itemstock.save.move' , 'method' => 'POST' )) !!}
                    {{-- {!! Form::model( $itemstock, ['route' => ['itemstock.move', $itemstock->id], 'method' => 'POST' ]) !!} --}}

                    <input type="hidden" name="itemstock_id" id="itemstock_id" value="{{ $itemstock->id }}">
                    <input type="hidden" name="item_id" id="item_id" value="{{ $itemstock->item->id }}">

                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            {{Form::label('location_id', 'Office Locations')}}
                            {{Form::select('location_id', $office_locations->pluck('name', 'id'), null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => '-- Select --'])}}
                            <p>Is the Location you're looking for not in this list? Add them <a target="_blank" href="{{route('office-locations.create')}}">here</a>.</p>
                            </div>
                        </div>
                    </div>

                    {{ Form::submit('Move Item', ['class' => 'pull-right btn btn-default']) }}

                    {!! Form::close() !!}
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

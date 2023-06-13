{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Issue Product', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New product')

@section('content_header')
    <h1> Issue product </h1>
@stop

@section('content')
	@include('includes.messages')
    {{-- @include('alerts.errors') --}}
    <div class="row">

        <div class="card col-md-12">

            <div class="card-header">
                <div class="box-header with-border">
                    <h3 class="box-title">Issue product {{ $product->name }}</h3>
                </div>

                <div class="card-body">
                    {!! Form::open( array( 'route' => 'product.issuance' , 'method' => 'POST' )) !!}

                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            {{Form::label('staff_id', 'Staff')}}
                            {{Form::select('staff_id', $staffs->pluck('name', 'id'), null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Staff'])}}
                            <p>Is the Staff you're looking for not in this list? Add them <a target="_blank" href="{{route('staff.create')}}">here</a>.</p>
                            </div>
                        </div>
                    </div>

                    {{ Form::submit('Issue Product', ['class' => 'pull-right btn btn-default']) }}

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

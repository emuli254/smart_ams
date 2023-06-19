{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'ODPP AMS | Create Item Stock', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New item')

@section('content_header')
    <h1>New Item Stock</h1>
@stop

@section('content')

@include('includes.messages')

    {{-- @include('alerts.errors') --}}


        <div class="col-sm-12">
            <div class="box box-danger">

                <div class="box-header with-border">
                    <h3 class="box-title">New Item Stock for {{ $item->name }} </h3>
                </div>
                <div class="box-body">

                    {!! Form::open( array( 'route' => 'item-stocks.store' , 'method' => 'POST' )) !!}

                    <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            {{Form::label('description', 'Item description')}}
                            {{Form::textarea('description', '', ['id' => 'ck-textarea', 'class' => 'form-control ck-textarea', 'style' => 'resize: vertical', 'placeholder' => 'Item description'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('supplier_id', 'Supplier')}}
                                {{Form::select('supplier_id', $suppliers->pluck('name', 'id'), null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Supplier'])}}
                            <p>Is the supplier you're looking for not in this list? Add them <a target="_blank" href="/suppliers/create">here</a>.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            {{Form::label('buy_price', 'Buy-in price')}}
                            {{Form::number('buy_price', '', ['step' => '0.01', 'class' => 'form-control', 'placeholder' => 'Buy-in price'])}}
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('serial_part_no', 'Serial/Part No.') }}
                                {{ Form::text('serial_part_no', '', ['class' => 'form-control', 'placeholder' => 'Serial/Part No.']) }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('asset_tag_no', 'Asset Tag') }}
                                {{ Form::text('asset_tag_no', '', ['class' => 'form-control', 'placeholder' => 'Asset Tag']) }}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('select_office', 'Select Office')}}
                                {{Form::select('select_office', $office_locations->pluck('name', 'id'), null, ['id' => 'select_office', 'class' => 'form-control select_office', 'placeholder' => '-- Select Office --'])}}
                            <p>Is the supplier you're looking for not in this list? Add them <a target="_blank" href="{{ route('office-locations.create') }}">here</a>.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                            {{Form::label('in_stock', 'In stock')}}
                            {{Form::select('in_stock', [0 => 'No', 1 => 'Yes'], null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Please Select One'])}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            {{Form::label('discontinued', 'Discontinued')}}
                            {{Form::select('discontinued', [0 => 'No', 1 => 'Yes'], null, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Discontinued'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {{ Form::submit('Create Stock', ['class' => 'form-group pull-right btn btn-default']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
		</div>

@stop

@section('js')
  <script src="{{asset('js/render_select2.js')}}" charset="utf-8"></script>
  {{-- <script src="{{asset('js/render_select2.js')}}" charset="utf-8"></script> --}}
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="{{asset('js/render_ckeditor.js')}}" charset="utf-8"></script>
@endsection

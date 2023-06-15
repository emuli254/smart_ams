{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Create Product Stock', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'New product')

@section('content_header')
    <h1>New Product Stock</h1>
@stop

@section('content')

@include('includes.messages')

    {{-- @include('alerts.errors') --}}


        <div class="col-sm-12">
            <div class="box box-danger">

                <div class="box-header with-border">
                    <h3 class="box-title">New Product Stock for {{ $productstock->product->name }} </h3>
                </div>
                <div class="box-body">

                    {!! Form::model( $productstock, ['route' => ['product-stocks.update', $productstock->id], 'method' => 'POST' ]) !!}

                    <input type="hidden" name="product_id" id="product_id" value="{{ $productstock->product_id }}">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            {{Form::label('description', 'Product description')}}
                            {{Form::textarea('description', $productstock->description, ['id' => 'ck-textarea', 'class' => 'form-control ck-textarea', 'style' => 'resize: vertical', 'placeholder' => 'Product description'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                            {{Form::label('supplier_id', 'Supplier')}}
                            {{Form::select('supplier_id', $suppliers->pluck('name', 'id'), $productstock->supplier_id, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Supplier'])}}
                            <p>Is the supplier you're looking for not in this list? Add them <a target="_blank" href="/suppliers/create">here</a>.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            {{Form::label('buy_price', 'Buy-in price')}}
                            {{Form::number('buy_price', $productstock->buy_price, ['step' => '0.01', 'class' => 'form-control', 'placeholder' => 'Buy-in price'])}}
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('serial_part_no', 'Serial/Part No.') }}
                                {{ Form::text('serial_part_no', $productstock->serial_part_no, ['class' => 'form-control', 'placeholder' => 'Serial/Part No.']) }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('asset_tag_no', 'Asset Tag') }}
                                {{ Form::text('asset_tag_no', $productstock->asset_tag_no, ['class' => 'form-control', 'placeholder' => 'Asset Tag']) }}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        {{Form::label('in_stock', 'In stock')}}
                        {{Form::select('in_stock', [0 => 'No', 1 => 'Yes'], $productstock->in_stock, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Please Select One'])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        {{Form::label('discontinued', 'Discontinued')}}
                        {{Form::select('discontinued', [0 => 'No', 1 => 'Yes'], $productstock->discontinue, ['id' => 'select2', 'class' => 'form-control select2', 'placeholder' => 'Discontinued'])}}
                        </div>
                    </div>
                    </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Save Stock Changes', ['class' => 'pull-right btn btn-default']) }}

                {!! Form::close() !!}
                </div>
            </div>
		</div>

@stop

@section('js')
  <script src="{{asset('js/render_select2.js')}}" charset="utf-8"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="{{asset('js/render_ckeditor.js')}}" charset="utf-8"></script>
@endsection

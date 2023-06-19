{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Supplier Details', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Supplier')

@section('content_header')
    <h1>Supplier {{$supplier->name}}</h1>
@stop

@section('content')

	@include('includes.messages')

    <div class="row mx-2">
			<div class="col-sm-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Supplier {{$supplier->name}}</h3>
					</div>
					<div class="box-body">
						<dl class="dl-vertical">
							<dt>Supplier name</dt>
							<dd>{{$supplier->name}}</dd>
              <dt>Website</dt>
							<dd><a target="_blank" href="{{$supplier->website}}">{{$supplier->website}}</a></dd>
							<dt>Created at</dt>
							<dd>{{$supplier->created_at}}</dd>
						</dl>
					</div>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Items supplied by {{$supplier->name}}</h3>
					</div>
					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Item name</th>
									<th>Buy-in price</th>
									<th>Instock</th>
									<th>Discontinued</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($itemstocks as $itemstock)
									<tr>
										<td>{{$itemstock->id}}</td>
										<td>{{$itemstock->name}}</td>
										<td>{{$itemstock->buy_price}}</td>
										<td>
											@if ($itemstock->in_stock == 1)
												Yes
											@else
												No
											@endif
										</td>
										<td>
											@if ($itemstock->discontinued == 1)
												Yes
											@else
												No
											@endif
										</td>
										<td><a href="{{ route('item-stocks.edit', $itemstock->id ) }}" class="btn btn-default">Edit</a></td>
									</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>
@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection

@extends('adminlte::page')

@section('title', 'Product categories')

@section('content_header')
    <h1>Product category {{$category->name}}</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Product category {{$category->name}}</h3>
					</div>
					<div class="box-body">
						<dl class="dl-vertical">
							<dt>Category name</dt>
							<dd>{{$category->name}}</dd>
							<dt>Created at</dt>
							<dd>{{$category->created_at}}</dd>
						</dl>
					</div>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Products in category {{$category->name}}</h3>
					</div>
					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Product name</th>
									<th>Sales price</th>
									<th>Buy-in price</th>
									<th>Instock</th>
									<th>Discontinued</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($items as $item)
									<tr>
										<td>{{$item->id}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->sales_price}}</td>
										<td>{{$item->buy_price}}</td>
										<td>
											@if ($item->instock == 1)
												Yes
											@else
												No
											@endif
										</td>
										<td>
											@if ($item->discontinued == 1)
												Yes
											@else
												No
											@endif
										</td>
										<td><a href="/items/{{$item->id}}/edit" class="btn btn-default">Edit</a></td>
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

@extends('adminlte::page')

@section('title', 'Office location')

@section('content_header')
    <h1>Office location {{$location->name}}</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Item location {{$location->name}}</h3>
					</div>
					<div class="box-body">
						<dl class="dl-vertical">
							<dt>Location name</dt>
							<dd>{{$location->name}}</dd>
              <dt>County</dt>
              <dd>{{$location->county}} {{$location->subcounty}}</dd>
              <dt>Street / Road</dt>
              <dd>{{$location->street}}</dd>
              <dt>Building</dt>
              <dd>{{$location->building}}</dd>
              <dt>Office Code</dt>
              <dd>{{$location->office_code}}</dd>
							<dt>Created at</dt>
							<dd>{{$location->created_at}}</dd>
						</dl>
					</div>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Items at location {{$location->name}}</h3>
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
                  <th>Quantity at this location</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($stocks as $stock)
									<tr>
										<td>{{$stock->product->id}}</td>
										<td>{{$stock->product->name}}</td>
										<td>{{$stock->product->buy_price}}</td>
										<td>
											@if ($stock->product->instock == 1)
												Yes
											@else
												No
											@endif
										</td>
										<td>
											@if ($stock->product->discontinued == 1)
												Yes
											@else
												No
											@endif
										</td>
                    <td>{{$stock->quantity}}</td>
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

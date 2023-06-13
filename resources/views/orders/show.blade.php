{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Order Details', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Order')

@section('content_header')
    <h1>Order #{{$order->id}}</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">General</h3>
					</div>
					<div class="box-body">
						<dl class="dl-vertical">
							<dt>Staff name</dt>
							<dd><a href="/staff/{{$order->staff->id}}">{{$order->staff->name}}</a> </dd>
							<dt>Created at</dt>
							<dd>{{$order->created_at}}</dd>
						</dl>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Products</h3>
					</div>
					<div class="box-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Product name</th>
									<th>Quantity</th>
									<th>Price per product</th>
                  <th class="text-right">Total</th>
								</tr>
							</thead>
							<tbody>

                @php $i = 0; $total = 0; @endphp
                @foreach ($order->orderproducts as $product)
                  @php

                    $i++;
                    $current_product_total_price_unformatted = $product->sales_price * $product->quantity;
                    $current_product_total_price = number_format($current_product_total_price_unformatted, 2);

                    $total = $total + $current_product_total_price_unformatted;

                  @endphp
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$product->name}} (#{{$product->id}})</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->sales_price}}</td>
                    <td class="text-right">{{$current_product_total_price}}</td>
                  </tr>
                @endforeach

                <tr class="im-total-border">
                  <td colspan="5" class="text-right text-bold">Total due KES: ;{{$total}}</td>
                </tr>

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

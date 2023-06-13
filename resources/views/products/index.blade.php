@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'All Products', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Products</h3>
					</div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products.create') }}" class="btn btn-success"> New Product </a>
                    </div>

					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Product name</th>
                  <th>Buy-in price</th>
                  <th>Instock</th>
                  <th>Discontinued</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($products as $product)
									<tr>
										<td>{{$product->id}}</td>
										<td>{{$product->name}}</td>
                                    <td>{{$product->buy_price}}</td>
                                    <td>
                                    @if ($product->instock == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                    </td>
                                    <td>
                                    @if ($product->discontinued == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                    </td>
                                    <td>
                                        <a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a>
                                        {{-- <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Issue</a> --}}

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-issue" data-id="{{$product->id}}">
                                            Issue
                                        </button>

                                    </td>

                                    </tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>


@include('product-issuance.create')

@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection

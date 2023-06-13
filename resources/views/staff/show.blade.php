{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Staff Details', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Staff')

@section('content_header')
    <h1>Staff {{$staff->name}}</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-3">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Staff {{$staff->name}}</h3>
					</div>
					<div class="box-body">
						<dl class="dl-vertical">
							<dt>Staff name</dt>
							<dd>{{$staff->name}}</dd>
							<dt>Phone</dt>
							<dd>{{$staff->phone}}</dd>
							<dt>Email address</dt>
							<dd>{{$staff->email}}</dd>
							<dt>Department</dt>
							<dd>{{$staff->department}}</dd>
							<dt>Division</dt>
							<dd>{{$staff->division}}</dd>
							<dt>Designation</dt>
							<dd>{{$staff->designation}}</dd>
							<dt>Personal Number</dt>
							<dd>{{$staff->personal_number}}</dd>
							<dt>Created at</dt>
							<dd>{{$staff->created_at}}</dd>
						</dl>
					</div>
				</div>
			</div>
      <div class="col-sm-9">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Orders</h3>
          </div>
          <div class="box-body">
            <table class="table" id="datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Staff name</th>
                  <th>Status</th>
                  <th>Created at</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)

                  @php
                    if(in_array($order->status, ['Request', 'Request sent'])) {
                      $label = 'warning';
                    } elseif(in_array($order->status, ['Processing', 'Awaiting payment', 'Ready to ship'])) {
                      $label = 'info';
                    } elseif(in_array($order->status, ['Shipped'])) {
                      $label = 'success';
                    } elseif(in_array($order->status, ['Cancelled', 'Back order'])) {
                      $label = 'danger';
                    } else {$label = '';}
                  @endphp

                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->staff->name}}</td>
                    <td><span class="label label-{{$label}}">{{$order->status}}</span></td>
                    <td>{{$order->created_at}}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
    </div>
@stop

@section('js')
  <script src="{{asset('js/render_select2.js')}}" charset="utf-8"></script>
@endsection

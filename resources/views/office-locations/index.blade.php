@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP Asset Management System by Erick Muli', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Storage locations')

@section('content_header')
    <h1>Office locations</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Office locations</h3>
					</div>
					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Location name</th>
                  <th>County</th>
                  <th>Sub County</th>
                  <th>Building</th>
                  <th>Office Code</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($locations as $location)
									<tr>
										<td>{{$location->id}}</td>
										<td><a href="/office-locations/{{$location->id}}">{{$location->name}}</a></td>
                    <td>{{$location->county}} {{$location->subcounty}}</td>
                    <td>{{$location->street}}</td>
                    <td>{{$location->building}}</td>
                    <td>{{$location->country}}</td>
										<td><a href="/office-locations/{{$location->id}}/edit" class="btn btn-default">Edit</a></td>
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

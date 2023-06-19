@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Office Locations', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Storage locations')

@section('content_header')
    <h1>Office locations</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Office locations
                    <a href="{{ route('office-locations.create') }}" class="btn btn-success pull-right"> <i class="fa fa-plus-circle"> </i> New Office Location </a>
                </h3>
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
                            <th> Action </th>
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
                                <td>{{$location->office_code}}</td>
                                <td><a href="{{ route('office-locations.edit', $location->id ) }}" class="btn btn-default"> <i class="fa fa-pencil"> </i> Edit</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection

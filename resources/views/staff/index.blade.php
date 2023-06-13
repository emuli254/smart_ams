@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Staff List', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Staff')

@section('content_header')
    <h1>Staff</h1>
@stop

@section('content')
	@include('includes.messages')

    <div class="">

        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Staff
                        <a href="{{ route('staff.create') }}" class="btn btn-success pull-right"> New Staff </a>
                    </h3>
                    {{-- <a href="{{ route('staff.create') }}" class="btn btn-success"> New Staff </a> --}}
                </div>
                <div class="d-flex justify-content-end">

                </div>
                <div class="box-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Staff name</th>
                                <th>Email address</th>
                                <th>Phone number</th>
                                <th>Department</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($staff as $staff)
                                <tr>
                                    <td>{{$staff->id}}</td>
                                    {{-- <td><a href="/staff/{{$staff->id}}">{{$staff->name}}</a></td> --}}
                                    <td><a href="{{ route('staff.show', $staff->id ) }}"> {{$staff->name}} </a> </td>

                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->department}}</td>
                                    {{-- <td><a href="/staff/{{$staff->id}}/edit" class="btn btn-default">Edit</a></td> --}}
                                    <td><a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-default">Edit</a></td>

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

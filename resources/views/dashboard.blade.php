@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Dashboard', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">


            <div class="row">


                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-body bg-success text-white my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-users fa-5x"></i>
                            <div class="d-flex flex-column">
                                <label class="text-white">All Staff</label>
                                <h1>{{ $staffcount }}</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('staff.index') }}" class="text-warning">View All</a>
                          </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-body bg-primary text-white my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-laptop fa-5x"></i>
                            <div class="d-flex flex-column">
                                <label class="text-white">All Items </label>
                                <h1>{{ $itemstocks }}</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('items.index') }}" class="text-warning">View All</a>
                          </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-body bg-warning text-white my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-truck fa-5x"></i>
                            <div class="d-flex flex-column">
                                <label class="text-white">All Suppliers </label>
                                <h1>{{ $suppliercount }}</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('suppliers.index') }}" class="text-warning">View All</a>
                          </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-body bg-secondary text-white my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-map-marker fa-5x"></i>
                            <div class="d-flex flex-column">
                                <label class="text-white">All Locations </label>
                                <h1>{{ $office_locations_count }}</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('office-locations.index') }}" class="text-warning">View All</a>
                          </div>
                    </div>
                </div>



            </div>


            <!-- Area Chart Example-->
            {{-- <div class="card mb-3">
                <div class="card-header">
                <i class="fa fa-area-chart"></i> Sales Chart</div>
                <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div> --}}

            <div class="row">

                <div class="col-xl-4 col-sm-4 mb-3">

                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title"> Item Movement </h4>
                            <p class="card-category"> History of Item Movements </p>
                        </div>

                        <div class="card-body ">

                            <div class="">

                                <ul class="list-unstyled">
                                    @if ( $item_movements->isNotEmpty() )
                                        @foreach ( $item_movements as $item_movement )
                                        <li class="card mb-3 bg-light">
                                            <div class="card-body">
                                            <p class="card-text">
                                                {{ $item_movement->item_name()->name }}, Asset Tag No:
                                                <i class="text-primary"> {{ $item_movement->item_stock->asset_tag_no }} </i> moved to Location: <i class="text-primary"> {{ $item_movement->is_moved_to->name }} </i>
                                                by User: <i class="text-primary"> {{ $item_movement->is_transacted_by->name }} </i>
                                            </p>
                                            <h6 class="card-title text-right">{{ $item_movement->created_at->format('d M Y H:i:s A ') }}</h6>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif

                                  </ul>

                            </div>
                        </div>

                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xl-4 col-sm-4 mb-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title"> Item Issuances </h4>
                            <p class="card-category"> History of Item Issuances </p>
                        </div>

                        <div class="card-body ">

                            <div class="">

                                <ul class="list-unstyled">
                                    @if ( $item_issuances->isNotEmpty() )
                                        @foreach ( $item_issuances as $item_issuance )
                                        <li class="card mb-3 bg-light">
                                            <div class="card-body">
                                            <p class="card-text">
                                                {{ $item_issuance->item_name()->name }}, Asset Tag No:
                                                <i class="text-primary"> {{ $item_issuance->item_stock->asset_tag_no }} </i> was issued to Staff:
                                                <i class="text-primary"> {{ $item_issuance->is_issued_to->name }} </i>
                                                by User: <i class="text-primary"> {{ $item_issuance->is_transacted_by->name }} </i>
                                            </p>
                                            <h6 class="card-title text-right">{{ $item_issuance->created_at->format('d M Y H:i:s A ') }}</h6>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>

                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-sm-4 mb-3">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title"> Item Returns </h4>
                            <p class="card-category"> History of Item Returns </p>
                        </div>

                        <div class="card-body ">

                            <div class="">

                                <ul class="list-unstyled">
                                    @if ( $item_returns->isNotEmpty() )
                                        @foreach ( $item_returns as $item_return )
                                        <li class="card mb-3 bg-light">
                                            <div class="card-body">
                                            <p class="card-text">
                                                {{ $item_return->item_name()->name }}, Asset Tag No:
                                                <i class="text-primary"> {{ $item_return->item_stock->asset_tag_no }} </i> was issued to Staff:
                                                <i class="text-primary"> {{ $item_return->is_issued_to->name }} </i>
                                                by User: <i class="text-primary"> {{ $item_return->is_transacted_by->name }} </i>
                                            </p>
                                            <h6 class="card-title text-right">{{ $item_return->created_at->format('d M Y H:i:s A ') }}</h6>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>

                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>




            </div>




        </div>
    </div>

@endsection

@push('js')

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script> --}}

@endpush

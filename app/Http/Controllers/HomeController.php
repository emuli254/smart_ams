<?php

namespace App\Http\Controllers;

use App\Models\ItemStock;
use App\Models\ItemStockTransaction;
use App\Models\OfficeLocation;
use App\Staff;
use App\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $staffcount = Staff::all()->count();
        $suppliercount = Supplier::all()->count();
        $itemstocks = ItemStock::all()->count();
        $office_locations_count = OfficeLocation::all()->count();

        $item_movements = ItemStockTransaction::where('transaction_type', '2')->latest()->limit(10)->get();
        $item_issuances = ItemStockTransaction::where('transaction_type', '1' )->latest()->limit(10)->get();
        $item_returns = ItemStockTransaction::where('transaction_type', '0' )->latest()->limit(10)->get();


        return view('dashboard', compact( 'staffcount', 'suppliercount', 'itemstocks', 'office_locations_count' , 'item_movements', 'item_issuances', 'item_returns' ) );
        // return view('dashboardlte');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ItemIssuance;
use App\Models\ItemStock;
use App\Models\ItemStockIssuance;
use App\Models\Item;
use App\Staff;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Get all the items
        $itemstocks = ItemStock::all();

        // Return the index view
        return view('item-stocks.index')->with('itemstocks', $itemstocks);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    public function createStock($item)
    {
        $item = Item::find($item);
        $suppliers = Supplier::all();

        return view('item-stocks.create')->with('item', $item)->with('suppliers', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate user input
        $validator = Validator::make($request->all(), [

            'item_id' => 'required|numeric',
            'description' => 'required|min:3|max:500',
            'supplier_id' => 'required|numeric',
            'serial_part_no' => 'required',
            'asset_tag_no' => 'required',
            'buy_price' => 'required|numeric',
            'in_stock' => 'required|numeric|between:0,1',
            'discontinued' => 'required|numeric|between:0,1',

        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            // return response()->json($validator->errors(), 422);
            return redirect()->back()->withErrors($errors);

        } else {
            // Save the item
            // ...

            // Create new instance of the model
            $itemstock = new ItemStock;

            $itemstock->item_id = $request->input('item_id');
            $itemstock->description = $request->input('description');
            $itemstock->supplier_id = $request->input('supplier_id');
            $itemstock->serial_part_no = $request->input('serial_part_no');
            $itemstock->asset_tag_no = $request->input('asset_tag_no');
            $itemstock->buy_price = $request->input('buy_price');
            $itemstock->in_stock = $request->input('in_stock');
            $itemstock->discontinued = $request->input('discontinued');

            // Save the new item
            $itemstock->save();

            // Return to index view with success message
            return redirect()->route('item-stocks.show', $itemstock->item_id)->with('success', 'Item Stock has been created!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Get all the items
        $item = Item::find($id);
        $itemstocks = ItemStock::where('item_id', $id)->get();

        // Return the index view
        return view('item-stocks.index')->with('itemstocks', $itemstocks)->with('item', $item);
        // return $itemstocks;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $itemstock = ItemStock::find($id);

        // $item = Item::find($item);
        $suppliers = Supplier::all();

        return view('item-stocks.edit')->with('itemstock', $itemstock)->with('suppliers', $suppliers);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $itemstock = ItemStock::find($id) ;

        // Validate user input
        $validator = Validator::make($request->all(), [

            'item_id' => 'required|numeric',
            'description' => 'required|min:3|max:500',
            'supplier_id' => 'required|numeric',
            'serial_part_no' => 'required',
            'asset_tag_no' => 'required',
            'buy_price' => 'required|numeric',
            'in_stock' => 'required|numeric|between:0,1',
            'discontinued' => 'required|numeric|between:0,1',

        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            // return response()->json($validator->errors(), 422);
            return redirect()->back()->withErrors($errors);

        } else {

            // Save the item
            $itemstock->item_id = $request->input('item_id');
            $itemstock->description = $request->input('description');
            $itemstock->supplier_id = $request->input('supplier_id');
            $itemstock->serial_part_no = $request->input('serial_part_no');
            $itemstock->asset_tag_no = $request->input('asset_tag_no');
            $itemstock->buy_price = $request->input('buy_price');
            $itemstock->in_stock = $request->input('in_stock');
            $itemstock->discontinued = $request->input('discontinued');

            // Save the new item
            $itemstock->save();

            // Return to index view with success message
            return redirect()->route('item-stocks.show', $itemstock->item_id )->with('success', 'Item Stock Edited Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function issue($itemstock)
    {
        $itemstock = ItemStock::find($itemstock);
        $staffs = Staff::all();
        return view('item-issuance.create')->with('itemstock', $itemstock)->with('staffs', $staffs);
    }

    public function saveIssue(Request $request)
    {
        // Validate user input
        $this->validate($request, [
            'item_id' => 'required',
            'itemstock_id' => 'required',
            'staff_id' => 'required',
            'user_id' => 'required'
          ]);

        $item_id = $request->input('item_id');

        // Create new instance of the model
        $itemissue = new ItemStockIssuance;

        $itemissue->itemstock_id = $request->input('itemstock_id');
        $itemissue->staff_id = $request->input('staff_id');
        $itemissue->issued_by_id = $request->input('user_id');

        // Save the new item
        $itemissue->save();

           // Return to index view with success message
        return redirect()->route('item-stocks.show', $item_id )->with('success', 'Item has been issued successfully!');


    }




}

<?php

namespace App\Http\Controllers;

use App\Models\ProductIssuance;
use App\Models\ProductStock;
use App\Models\ProductStockIssuance;
use App\Product;
use App\Staff;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Get all the products
        $productstocks = ProductStock::all();

        // Return the index view
        return view('product-stocks.index')->with('productstocks', $productstocks);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    public function createStock($product)
    {
        $product = Product::find($product);
        $suppliers = Supplier::all();

        return view('product-stocks.create')->with('product', $product)->with('suppliers', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate user input
        $validator = Validator::make($request->all(), [

            'product_id' => 'required|numeric',
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
            // Save the product
            // ...

            // Create new instance of the model
            $productstock = new ProductStock;

            $productstock->product_id = $request->input('product_id');
            $productstock->description = $request->input('description');
            $productstock->supplier_id = $request->input('supplier_id');
            $productstock->serial_part_no = $request->input('serial_part_no');
            $productstock->asset_tag_no = $request->input('asset_tag_no');
            $productstock->buy_price = $request->input('buy_price');
            $productstock->in_stock = $request->input('in_stock');
            $productstock->discontinued = $request->input('discontinued');

            // Save the new product
            $productstock->save();

            // Return to index view with success message
            return redirect()->route('product-stocks.show', $productstock->product_id)->with('success', 'Product Stock has been created!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Get all the products
        $product = Product::find($id);
        $productstocks = ProductStock::where('product_id', $id)->get();

        // Return the index view
        return view('product-stocks.index')->with('productstocks', $productstocks)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $productstock = ProductStock::find($id);

        // $product = Product::find($product);
        $suppliers = Supplier::all();

        return view('product-stocks.edit')->with('productstock', $productstock)->with('suppliers', $suppliers);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $productstock = ProductStock::find($id) ;

        // Validate user input
        $validator = Validator::make($request->all(), [

            'product_id' => 'required|numeric',
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

            // Save the product
            $productstock->product_id = $request->input('product_id');
            $productstock->description = $request->input('description');
            $productstock->supplier_id = $request->input('supplier_id');
            $productstock->serial_part_no = $request->input('serial_part_no');
            $productstock->asset_tag_no = $request->input('asset_tag_no');
            $productstock->buy_price = $request->input('buy_price');
            $productstock->in_stock = $request->input('in_stock');
            $productstock->discontinued = $request->input('discontinued');

            // Save the new product
            $productstock->save();

            // Return to index view with success message
            return redirect()->route('product-stocks.show', $productstock->product_id )->with('success', 'Product Stock Edited Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function issue($productstock)
    {
        $productstock = ProductStock::find($productstock);
        $staffs = Staff::all();
        return view('product-issuance.create')->with('product', $productstock)->with('staffs', $staffs);
    }

    public function saveIssue(Request $request)
    {
        // Validate user input
        $this->validate($request, [
            'productstock_id' => 'required',
            'staff_id' => 'required',
            'user_id' => 'required'
          ]);

        // Create new instance of the model
        $productissue = new ProductStockIssuance;

        $productissue->productstock_id = $request->input('productstock_id');
        $productissue->staff_id = $request->input('staff_id');
        $productissue->issued_by_id = $request->input('user_id');

        // Save the new product
        $productissue->save();

           // Return to index view with success message
        return redirect()->route('product-stocks.show', $productissue->productstock_id )->with('success', 'Product has been issued successfully!');


    }




}

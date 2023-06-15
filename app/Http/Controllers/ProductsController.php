<?php

namespace App\Http\Controllers;

use App\Models\ProductIssuance;
use App\Product;
use App\ProductCategory;
use App\Supplier;
use App\Staff;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the products
        $products = Product::all();

        // Return the index view
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get product categories and suppliers
        $categories = ProductCategory::all();

        // Return the create view
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:150',
            'product_category_id' => 'required|numeric',
            // 'supplier_id' => 'required|numeric',
            // 'asset_id' => 'required',
            // 'buy_price' => 'required|numeric',
            // 'instock' => 'required|numeric|between:0,1',
            // 'discontinued' => 'required|numeric|between:0,1'
            // 'description' => 'required|min:3|max:500',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            // return response()->json($validator->errors(), 422);
            return redirect()->back()->withErrors($errors);

        } else {
            // Save the product
            // ...

            // Create new instance of the model
            $product = new Product;

            $product->name = $request->input('name');
            $product->category_id = $request->input('product_category_id');

            // $product->description = $request->input('description');
            // $product->supplier_id = $request->input('supplier_id');
            // $product->asset_id = $request->input('asset_id');
            // $product->buy_price = $request->input('buy_price');
            // $product->instock = $request->input('instock');
            // $product->discontinued = $request->input('discontinued');

            // Save the new product
            $product->save();

            // Return to index view with success message
            return redirect('/products')->with('success', 'Product has been created!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        // Get the product to edit
        $product = Product::find($product);

        // Get suppliers and categories
        // $suppliers = Supplier::all();
        $categories = ProductCategory::all();

        // Return the edit view
        return view('products.edit')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        // Get the product
        $product = Product::find($product);

        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:products,name,'.$product->id,
          'product_category_id' => 'required|numeric',

        //   'description' => 'required|min:3|max:500',
        //   'supplier_id' => 'required|numeric',
        //   'buy_price' => 'required|numeric',
        //   'instock' => 'required|numeric|between:0,1',
        //   'discontinued' => 'required|numeric|between:0,1'
        ]);

        $product->name = $request->input('name');
        $product->category_id = $request->input('product_category_id');

        // $product->description = $request->input('description');
        // $product->supplier_id = $request->input('supplier_id');
        // $product->buy_price = $request->input('buy_price');
        // $product->instock = $request->input('instock');
        // $product->discontinued = $request->input('discontinued');

        // Save the updated product
        $product->save();

        // Return to index view with success message
        return redirect('/products')->with('success', 'Product has been edited and changes were saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    // public function issue($product)
    // {
    //     $product = Product::find($product);
    //     $staffs = Staff::all();
    //     return view('product-issuance.create')->with('product', $product)->with('staffs', $staffs);
    // }

    // public function saveIssue(Request $request)
    // {

    //     // Validate user input
    //     $this->validate($request, [
    //         'product_id' => 'required',
    //         'staff_id' => 'required',
    //         'user_id' => 'required'
    //       ]);

    //     // Create new instance of the model
    //     $productissue = new ProductIssuance;

    //     $productissue->product_id = $request->input('product_id');
    //     $productissue->staff_id = $request->input('staff_id');
    //     $productissue->issued_by_id = $request->input('user_id');

    //     // Save the new product
    //     $productissue->save();

    //        // Return to index view with success message
    //     return redirect()->route('products.index')->with('success', 'Product has been issued successfully!');


    // }


}

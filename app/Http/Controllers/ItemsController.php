<?php

namespace App\Http\Controllers;

use App\Models\ItemIssuance;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Supplier;
use App\Staff;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the items
        $items = Item::all();

        // Return the index view
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get item categories and suppliers
        $categories = ItemCategory::all();

        // Return the create view
        return view('items.create')->with('categories', $categories);
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
            'item_category_id' => 'required|numeric',

        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            // return response()->json($validator->errors(), 422);
            return redirect()->back()->withErrors($errors);

        } else {
            // Save the item
            // ...

            // Create new instance of the model
            $item = new Item;

            $item->name = $request->input('name');
            $item->category_id = $request->input('item_category_id');

            // Save the new item
            $item->save();

            // Return to index view with success message
            return redirect('/items')->with('success', 'Item has been created!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        // Get the item to edit
        $item = Item::find($item);

        // Get suppliers and categories
        // $suppliers = Supplier::all();
        $categories = ItemCategory::all();

        // Return the edit view
        return view('items.edit')->with('item', $item)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item)
    {
        // Get the item
        $item = Item::find($item);

        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:items,name,'.$item->id,
          'item_category_id' => 'required|numeric',

        ]);

        $item->name = $request->input('name');
        $item->category_id = $request->input('item_category_id');

        // Save the updated item
        $item->save();

        // Return to index view with success message
        return redirect('/items')->with('success', 'Item has been edited and changes were saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }


}

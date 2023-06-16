<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the item categories
        $categories = ItemCategory::all();

        // Return the index view
        return view('item-categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the create view
        return view('item-categories.create');
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
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:item_categories'
        ]);

        // Create a new instance of the model
        $category = new ItemCategory;

        $category->name = $request->input('name');

        // Save the new model
        $category->save();

        // Return to the index with a success message
        return redirect('/item-categories')->with('success', 'Item category has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show($itemCategory)
    {
        // Get the item category and its items
        $category = ItemCategory::find($itemCategory);
        $items = Item::where('item_category_id', $category->id)->get();

        // Return the show view
        return view('item-categories.show')->with('category', $category)->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($itemCategory)
    {
        // Get the item category
        $category = ItemCategory::find($itemCategory);

        // Return the edit view
        return view('item-categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $itemCategory)
    {
        // Get the item category
        $category = ItemCategory::find($itemCategory);

        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:item_categories,name,'.$category->id,
        ]);

        // Edit the item category
        $category->name = $request->input('name');

        // Save the changes
        $category->save();

        // Return to index view with success message
        return redirect('/item-categories')->with('success', 'Item category has been edited and changes were saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {
        //
    }
}

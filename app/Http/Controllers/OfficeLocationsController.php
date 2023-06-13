<?php

namespace App\Http\Controllers;

use App\OfficeLocation;
use App\ProductStock;
use Illuminate\Http\Request;

class OfficeLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the office location
        $locations = OfficeLocation::all();

        // Return the index view
        return view('office-locations.index')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the create view
        return view('office-locations.create');
    }

    /**
     * Store a newly created resource in office.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:office_locations',
          'county' => 'required|min:3|max:150',
          'subcounty' => 'required|min:1|max:150',
          'street' => 'required|min:1|max:150',
          'building' => 'required|min:3|max:150',
          'office_code' => 'required|min:1|max:150'
        ]);
        
        // Create a new instance of the model
        $location = new OfficeLocation;

        $location->name = $request->input('name');
        $location->county = $request->input('county');
        $location->subcounty = $request->input('subcounty');
        $location->street = $request->input('street');
        $location->building = $request->input('building');
        $location->office_code = $request->input('office_code');

        // Save the new model
        $location->save();

        // Redirect with success message
        return redirect('/office-locations')->with('success', 'Office location has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficeLocation  $OfficeLocation
     * @return \Illuminate\Http\Response
     */
    public function show($OfficeLocation)
    {
        // get the Office location and its products
        $location = OfficeLocation::find($OfficeLocation);
        $stocks = ProductStock::where([
          ['office_location_id', '=', $OfficeLocation],
          ['quantity', '>', 0],
        ])->get();

        // return view
        return view('office-locations.show')->with('location', $location)->with('stocks', $stocks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficeLocation  $OfficeLocation
     * @return \Illuminate\Http\Response
     */
    public function edit($OfficeLocation)
    {
        // Get the office location to edit
        $location = OfficeLocation::find($OfficeLocation);

        // Return the edit view
        return view('office-locations.edit')->with('location', $location);
    }

    /**
     * Update the specified resource in Office.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficeLocation  $OfficeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $OfficeLocation)
    {
        $location = OfficeLocation::find($OfficeLocation);

        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:office_locations,name,'.$location->id,
          'county' => 'required|min:3|max:150',
          'subcounty' => 'required|min:1|max:150',
          'street' => 'required|min:1|max:150',
          'building' => 'required|min:3|max:150',
          'office_code' => 'required|min:3|max:150'
        ]);

        // Edit the model
        $location->name = $request->input('name');
        $location->street = $request->input('street');
        $location->subcounty = $request->input('subcounty');
        $location->street = $request->input('street');
        $location->building = $request->input('building');
        $location->office_code = $request->input('office_code');

        // Save the changes
        $location->save();

        // Redirect with success message
        return redirect('/office-locations')->with('success', 'Office location was edited and changes were saved!');
    }

    /**
     * Remove the specified resource from office.
     *
     * @param  \App\OfficeLocation  $OfficeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeLocation $OfficeLocation)
    {
        //
    }
}

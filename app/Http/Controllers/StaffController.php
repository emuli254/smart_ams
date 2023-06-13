<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Order;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the staff
        $staff = staff::all();

        // return the view
        return view('staff.index')->with('staff', $staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:staff,email',
          'email' => 'required|min:3|max:150|email|unique:staff,email',
          'phone' => 'required|min:3|max:150',
          'personal_number' => 'required|min:3|max:150',
          'national_id_number' => 'required|min:1|max:150',
          'department' => 'required|min:1|max:150',
          'division' => 'required|min:3|max:150',
          'designation' => 'required|min:3|max:150'
        ]);

        // new instance of the model
        $staff = new staff;

        // set attributes
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->phone = $request->input('phone');
        $staff->personal_number = $request->input('personal_number');
        $staff->national_id_number = $request->input('national_id_number');
        $staff->department = $request->input('department');
        $staff->division = $request->input('division');
        $staff->designation = $request->input('designation');

        // save the staff
        $staff->save();

        // redirect
        return redirect('/staff')->with('success', 'staff has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($staff)
    {
        // get the staff
        $staff = staff::find($staff);
        $orders = Order::where('staff_id', $staff->id)->get();

        // return view
        return view('staff.show')->with('staff', $staff)->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($staff)
    {
        // get the staff
        $staff = staff::find($staff);

        // return view
        return view('staff.edit')->with('staff', $staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff)
    {
      // get existing staff
      $staff = Staff::find($staff);

        // validate
        // $this->validate($request, [
        //   'name' => 'required|min:3|max:150|unique:staff,email,'.$staff->id,
        //   'email' => 'required|min:3|max:150|email|unique:staff,email,'.$staff->id,
        //   'phone' => 'required|min:3|max:15',
        //   'personal_number' => 'required|min:3|max:12',
        //   'national_id_number' => 'required|min:1|max:15',
        //   'designation' => 'required|min:1|max:150',
        //   'department' => 'required|min:3|max:150',
        //   'division' => 'required|min:3|max:150'
        // ]);

        // set attributes
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->phone = $request->input('phone');
        $staff->personal_number = $request->input('personal_number');
        $staff->national_id_number = $request->input('national_id_number');
        $staff->department = $request->input('department');
        $staff->division = $request->input('division');
        $staff->designation = $request->input('designation');

        // save the staff
        $staff->save();

        // redirect
        return redirect()->route('staff.index')->with('success', 'staff has been updated and changes were saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(staff $staff)
    {
        //
    }
}

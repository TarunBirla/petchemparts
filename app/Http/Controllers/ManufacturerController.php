<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
public function index()
{
    $manufacturers = Manufacturer::orderBy('id','desc')->get();
    return view('backend.manufacturer.index', compact('manufacturers'));
}




    public function store(Request $request)
    
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'nullable|email',
            'phone'  => 'nullable',
            'address'=> 'nullable',
            'status' => 'required|in:active,inactive'
        ]);

        Manufacturer::create($request->all());

        return redirect()->back()->with('success','Manufacturer added successfully');
    }

    public function update(Request $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $manufacturer->update($request->all());

        return redirect()->back()->with('success','Manufacturer updated successfully');
    }

    public function destroy($id)
    {
        Manufacturer::findOrFail($id)->delete();
        return redirect()->back()->with('success','Manufacturer deleted successfully');
    }
}

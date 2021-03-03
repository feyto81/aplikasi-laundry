<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Outlet";
        $data['page_sub_title'] = "Outlet";
        $data['outlet'] = Outlet::all();
        return view('outlet.index', $data);
    }

    public function create()
    {
        $data['page_title'] = "Outlet";
        $data['page_sub_title'] = "Add New Outlet";
        return view('outlet.add', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'address' => 'required|min:2|max:20',
            'phone_number' => 'required|min:2|max:20',
        ]);
        $outlet = new Outlet;
        $outlet->name = $request->name;
        $outlet->address = $request->address;
        $outlet->phone_number = $request->phone_number;
        $outlet->save();
        if ($request->submit == "more") {
            return redirect()->route('admin.outlet.create')->with(['success' => 'Outlet has been saved !']);
        } else {
            return redirect()->route('admin.outlet.index')->with(['success' => 'Outlet has been saved']);
        };
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();
        return redirect()->back()->with(['success' => 'Outlet has been deleted']);
    }
    public function edit($id)
    {
        $data['page_title'] = "Outlet";
        $data['page_sub_title'] = "Edit Outlet";
        $data['outlet'] = Outlet::findOrFail($id);
        return view('outlet.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'address' => 'required|min:2|max:20',
            'phone_number' => 'required|min:2|max:20',
        ]);
        $outlet = Outlet::findOrFail($id);
        $outlet->name = $request->name;
        $outlet->address = $request->address;
        $outlet->phone_number = $request->phone_number;
        $result = $outlet->save();
        // dd($user);
        if ($result) {
            return redirect()->route('admin.outlet.index')->with(['success' => 'Outlet has been updated']);
        } else {
            return redirect()->back();
        }
    }
}

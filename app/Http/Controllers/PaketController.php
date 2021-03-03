<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Paket";
        $data['page_sub_title'] = "Paket";
        $data['paket'] = Paket::all();
        return view('paket.index', $data);
    }
    public function create()
    {
        $data['page_title'] = "Paket";
        $data['page_sub_title'] = "Add New Paket";
        $data['outlet'] = Outlet::all();
        return view('paket.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'outlet_id' => 'required',
            'type' => 'required',
            'paket_name' => 'required',
            'price' => 'required',
        ]);
        $paket = new Paket;
        $paket->outlet_id = $request->outlet_id;
        $paket->type = $request->type;
        $paket->paket_name = $request->paket_name;
        $paket->price = $request->price;
        $paket->save();
        if ($request->submit == "more") {
            return redirect()->route('admin.paket.create')->with(['success' => 'Paket has been saved !']);
        } else {
            return redirect()->route('admin.paket.index')->with(['success' => 'Paket has been saved']);
        };
    }
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();
        return redirect()->back()->with(['success' => 'Paket has been deleted']);
    }
    public function edit($id)
    {
        $data['page_title'] = "Paket";
        $data['page_sub_title'] = "Edit Paket";
        $data['paket'] = Paket::findOrFail($id);
        $data['outlet'] = Outlet::all();
        return view('paket.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'outlet_id' => 'required|',
            'type' => 'required',
            'paket_name' => 'required|min:2|max:20',
            'price' => 'required|min:2|max:20',
        ]);
        $paket = Paket::findOrFail($id);
        $paket->outlet_id = $request->outlet_id;
        $paket->type = $request->type;
        $paket->paket_name = $request->paket_name;
        $paket->price = $request->price;
        $result = $paket->save();
        // dd($user);
        if ($result) {
            return redirect()->route('admin.paket.index')->with(['success' => 'Paket has been updated']);
        } else {
            return redirect()->back();
        }
    }
}

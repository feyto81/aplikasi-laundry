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
}

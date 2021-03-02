<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Dashboards";
        $data['page_sub_title'] = "Dashboard";
        return view('home', $data);
    }

    public function login()
    {
        return view('login.login');
    }
}

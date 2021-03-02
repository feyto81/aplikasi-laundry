<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Users";
        $data['user'] = User::all();
        return view('user.index', $data);
    }
    public function edit()
    {
    }
}

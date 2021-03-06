<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Dashboards";
        $data['page_sub_title'] = "Dashboard";
        $data['outlet'] = Outlet::all()->count();
        $data['member'] = Member::all()->count();
        $data['paket'] = Paket::all()->count();
        $data['transaction'] = Transaction::all()->count();
        $data['user'] = User::all()->count();
        return view('home', $data);
    }

    public function login()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $username = Auth::user()->username;
            return redirect()->route('admin.home')->with(['success' => 'Welcome back ' . $username]);
        }
        return redirect()->route('login')->with(['error' => 'Invalid email or password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['success' => 'You have successfully logged out']);
    }
}

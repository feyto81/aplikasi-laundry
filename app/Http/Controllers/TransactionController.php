<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\Member;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Order List";
        $data['page_sub_title'] = "Order List";
        $data['transaction'] = Transaction::all();

        return view('transaction.index', $data);
    }
    public function create()
    {
        $data['page_title'] = "Transaction";
        $data['page_sub_title'] = "Add Transaction";
        $data['outlet'] = Outlet::all();
        $data['member'] = Member::all();
        return view('transaction.add', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Transaction";
        $data['page_sub_title'] = "Transaction";
        return view('transaction.index', $data);
    }
}

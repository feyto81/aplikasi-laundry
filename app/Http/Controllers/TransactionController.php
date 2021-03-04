<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Transaction";
        $data['page_sub_title'] = "Transaction";
        $data['transaction'] = Transaction::all();
        return view('transaction.index', $data);
    }
    public function create()
    {
        $data['page_title'] = "Transaction";
        $data['page_sub_title'] = "Add Transaction";
        return view('transaction.add', $data);
    }
}

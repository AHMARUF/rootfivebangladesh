<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PrintController extends Controller
{
      public function __construct()
      {
        $this->middleware('auth:admin');
      }

      public function prnpriview($order)
      {
           $order = DB::table('orders')->where('uni', $order)->first();
            return view('print',compact('order'));
      }
}

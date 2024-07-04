<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class logcontroller extends Controller
{

    public function index(Request $request)
    {
       $num1 = $request->num1;
       $num2 = $request->num2;
       $sum = $num1 + $num2;
       Log::info("the sum is $sum");
       return $sum;
    }
}

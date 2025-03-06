<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index()
    {
        return view("suma", ['resultado'=> null]);
    }

    public function suma(Request $request) {
        $num1 = $request->input('number_1');
        $num2 = $request->input('number_2');
        $result = $num1 + $num2;
    
        return view('suma', ['resultado' => $result]);
    }

}

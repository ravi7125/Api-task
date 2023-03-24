<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Apipassportcontroller extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
           
        ]);
    }
}

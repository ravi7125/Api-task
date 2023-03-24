<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Customer;

class MobileController extends Controller
{
 // database save data show ...
    public function show_customer($id){
            $customer = Mobile::find($id)->customer;
            return $customer;
           }
    }


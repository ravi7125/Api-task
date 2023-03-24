<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;
class insertdatacontroller extends Controller
{
    // insert data in database
    public function addaccount(Request $req)
     {
        $test = new test;
        $test->email=$req->email;
        $result=$test->save();
       if($result){
        return["return"=>"data hase been saved"];
       
    }else{
        return["return"=>"data not saved"];
       
    }
    }
}

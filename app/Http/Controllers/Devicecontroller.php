<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Account_users;
use Illuminate\Support\Facades\Validator;


class Devicecontroller extends Controller
{
 // get data in accounts tables in data base api
    public function list(){
        return Accounts::all();
    }

    //second step id vice show data in data table
    public function iddata($id){
        return Accounts::Find($id);
    }

    // user wish id check 

    public function data($id = null){
        return $id?Accounts::find($id):Account::all();
    }
    // name throw search data  in data base
    function search($bankname)
    {
       return Accounts::where("bankname",$bankname)->get();
    }
    //delete the data in database
    function delete($id){
        $account = Accounts::find($id);
        $result = $account->delete();
  
        if($result){
            return["return"=>"data hase been delete"];
           
        }else{
            return["return"=>"data not delete"];
           
        }
    }

    //Validation create.....
    function validation(Request $req){
     $rules = array(
        "bankname"=>"required"
     );
     $validator = Validator::make($req->all().$rules);
   if($validator->fails()){
   return response()->jason($validator->error() , 401);
   }else{

    return ["data"=> "correct"];
  
   }
 
  }    

}


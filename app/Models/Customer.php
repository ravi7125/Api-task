<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //relashionship customer table to mobile table one to one relationship
    use HasFactory;
    public function mobile(){
        return $this->hasone(Mobile::class);
    }
}

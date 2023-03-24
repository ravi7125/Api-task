<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;
    public function car(){
        return $this->hasone(Car::class);
    }

    public function owner(){
        return $this->hasoneThrough(Owner::class,car::class);
    } 
}

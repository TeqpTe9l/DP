<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class category extends Model
{
    public function products(){
        return $this->hasMany('App\Models\product');
    }
}

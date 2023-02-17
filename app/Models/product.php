<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productImage;
use App\Models\category;

class product extends Model
{
    public function images(){

        return $this->hasMany('App\Models\productImage');

    }
        
    public function category(){

        return $this->belongsTo('App\Models\category', 'category_id');

    }
}

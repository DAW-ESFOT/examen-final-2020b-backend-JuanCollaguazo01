<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'status'];


    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier')->withTimestamps();
    }
}

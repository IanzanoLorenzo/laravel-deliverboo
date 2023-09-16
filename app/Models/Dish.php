<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;
use App\Models\Order;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'resturant_id', 
        'name', 
        'ingredients', 
        'price', 
        'visibility'
    ];

    public function resturant(){
        return $this->belongsTo(Resturant::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('n_dish');
    }
}

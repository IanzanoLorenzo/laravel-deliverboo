<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;
use App\Models\Dish;

class Order extends Model
{
    use HasFactory;

    public function resturant(){
        return $this->belongsTo(Resturant::class);
    }

    public function dishes(){
        return $this->belongsToMany(Dish::class)->withPivot('n_dish');
    }
}

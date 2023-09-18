<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
use App\Models\Order;

class orderDishRelation extends Model
{
    use HasFactory;

    public $table = 'dish_order';

    public function dish(){
        return $this->belongsTo(Dish::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}

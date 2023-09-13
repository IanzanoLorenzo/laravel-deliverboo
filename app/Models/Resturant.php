<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Photo;
use App\Models\Dish;
use App\Models\Order;

class Resturant extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Photo;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Type;

class Resturant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'cover_image', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }

}

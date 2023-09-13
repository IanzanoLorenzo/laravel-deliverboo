<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;

class Photo extends Model
{
    use HasFactory;

    public function resturant(){
        return $this->belongsTo(Resturant::class);
    }
}

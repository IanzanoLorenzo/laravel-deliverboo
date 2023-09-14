<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');

        foreach($dishes as $item){
            $dish = new Dish();
            $dish->name = $item['name'];
            $dish->ingredients = $item['ingredients'];
            $dish->price = $item['price'];
            $dish->visibility = $item['visibility'];
            $dish->resturant_id = $item['resturant_id'];
            $dish->save();
        }
    }
}

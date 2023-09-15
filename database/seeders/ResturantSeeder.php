<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resturant;

class ResturantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resturants = config('resturants');

        foreach($resturants as $item){
            $resturant = new Resturant();
            $resturant->user_id = $item['user_id'];
            $resturant->name = $item['name'];
            $resturant->slug = $item['slug'];
            $resturant->address = $item['address'];
            $resturant->cover_image = $item['cover_image'];
            $resturant->save();
        }
    }
}

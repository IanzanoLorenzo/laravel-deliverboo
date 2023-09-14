<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Italiano',
                'icon' => 'fa-pizza-slice'
            ],
            [
                'name' => 'Giapponese',
                'icon' => 'fa-bowl-rice'
            ],
            [
                'name' => 'Messicano',
                'icon' => 'fa-pepper-hot'
            ],
        ];

        foreach($types as $item){
            $type = new Type();
            $type->name = $item['name'];
            $type->icon = $item['icon'];
            $type->save();
        }

    }
}

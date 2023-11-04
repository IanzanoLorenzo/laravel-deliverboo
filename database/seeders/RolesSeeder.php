<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('roles');

        foreach ($roles as $role) {
            $new_role = new Roles();
            $new_role->name = $role['name'];
            $new_role->role_n = $role['role_n'];
            $new_role->save();

        }
    }
}

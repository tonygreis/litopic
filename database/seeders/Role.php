<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create(['name'=> 'admin']);
        \Spatie\Permission\Models\Role::create(['name' => 'writer']);
        \Spatie\Permission\Models\Role::create(['name' => 'user']);
    }
}

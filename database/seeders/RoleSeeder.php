<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title' => 'admin',
            'name' => 'Администратор'
        ]);
        DB::table('roles')->insert([
            'title' => 'moderator',
            'name' => 'Модератор'
        ]);
        DB::table('roles')->insert([
            'title' => 'customer',
            'name' => 'Пользователь'
        ]);
        DB::table('roles')->insert([
            'title' => 'performer',
            'name' => 'Психолог'
        ]);
    }
}

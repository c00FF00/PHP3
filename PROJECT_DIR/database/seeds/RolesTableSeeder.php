<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'Админ',
        ]);

        DB::table('roles')->insert([
            'role' => 'Пользователь',
        ]);


    }
}
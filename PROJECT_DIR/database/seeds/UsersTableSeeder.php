<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Владимир',
            'patronymic' => 'Иванович',
            'family' => 'Петров',
            'email' => 'root@localhost',
            'roles_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'family' => 'Фамилия',
            'email' => 'root@localhost',
            'roles_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Имя',
            'patronymic' => '',
            'family' => 'Фамилия',
            'email' => 'root@localhost',
            'roles_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'family' => '',
            'email' => 'root@localhost',
            'roles_id' => '2',
        ]);
        
    }
}

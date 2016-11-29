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
    }
}

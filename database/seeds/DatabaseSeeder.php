<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'batata',
            'surname' => 'voadora',
            'email' => 'batata@gmail.com',
            'password' => bcrypt('123'),
            'CPF' => '11111111111',
            'UF' => 'RJ',
            'city' => 'volta redonda',
            'type_user' => 's',
        ]);
    }
}

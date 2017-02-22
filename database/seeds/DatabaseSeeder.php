<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserts para balizas
        DB::table('balizas')->insert([
            'id_baliza' => 1,
            'remonte' => 0,
        ]);
        DB::table('balizas')->insert([
            'id_baliza' => 2,
            'remonte' => 0,
        ]);
        DB::table('balizas')->insert([
            'id_baliza' => 3,
            'remonte' => 0,
        ]);
        DB::table('balizas')->insert([
            'id_baliza' => 4,
            'remonte' => 1,
        ]);
        DB::table('balizas')->insert([
            'id_baliza' => 5,
            'remonte' => 0,
        ]);
        
        
        //usuarios
        DB::table('users')
        ->insert([
            'name' => 'slasport',
            'email' => 'slasport@slasport.com',
            'admin' => 1,
            'password' => bcrypt('slasport'),
        ]);
         DB::table('users')
        ->insert([
            'name' => 'equipo',
            'email' => 'equipo@slasport.com',
            'admin' => 0,
            'password' => bcrypt('equipo'),
        ]);
    }
}

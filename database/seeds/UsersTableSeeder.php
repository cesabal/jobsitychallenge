<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'cesabal',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'PublimetroCol',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'EfectoCognitivo',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'redhatla',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'phpc',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'GeeH',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'PHPConPoland',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'phpsw',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'twitter_username' => 'platzi',
            )
            
            

        ));
        
        
    }
}
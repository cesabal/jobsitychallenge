<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('entries')->delete();
        
        \DB::table('entries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 5,
            ),
            7 => 
            array (
                'id' => 8,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 5,
            ),
            8 => 
            array (
                'id' => 9,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 5,
            ),
            9 => 
            array (
                'id' => 10,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 4,
            ),
            10 => 
            array (
                'id' => 11,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 2,
            ),
            11 => 
            array (
                'id' => 12,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 4,
            ),
            12 => 
            array (
                'id' => 13,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 5,
            ),
            14 => 
            array (
                'id' => 15,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 9,
            ),
            15 => 
            array (
                'id' => 16,
                'created_at' => '2019-11-03 22:38:42',
                'updated_at' => '2019-11-03 22:38:42',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 8,
            ),
            16 => 
            array (
                'id' => 17,
                'created_at' => '2019-11-04 09:24:09',
                'updated_at' => '2019-11-04 09:24:09',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 7,
            ),
            17 => 
            array (
                'id' => 18,
                'created_at' => '2019-11-08 17:26:21',
                'updated_at' => '2019-11-08 17:26:21',
                'title' => Str::random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
                'author' => 6,
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;
use App\Like;
use App\User;
use App\Photo;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 1000; $i){
            Like::create([
                'user_id' => rand(1, User::count()),
                'photo_id' => rand(1, Photo::count())
            ]);
        }
    }
}

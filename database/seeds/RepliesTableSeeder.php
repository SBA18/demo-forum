<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Reply::truncate();
        foreach(range(10, 1000) as $i) {
            Reply::create([
                'user_id' => mt_rand(1, 150),
                'topic_id' => mt_rand(1, 140),
                'uuid' => Str::uuid(),
                'reply' => $faker->realText(rand(80, 600)),
            ]);
        }
    }
}

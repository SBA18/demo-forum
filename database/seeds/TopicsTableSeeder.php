<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        Topic::truncate();
        foreach(range(5, 10) as $i) {
            Topic::create([
                'user_id' => 1,
                'uuid' => Str::uuid(),
                'title' => $faker->text(rand(10, 80)),
                'message' => $faker->realText(rand(80, 600)),
            ]);
        }

    }
}

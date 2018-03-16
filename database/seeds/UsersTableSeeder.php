<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::truncate();

        User::create([
            'name' => 'Sawers SAW',
            'email' => 'sawers@saw.com',
            'password' => bcrypt('secret'),
        ]);

        // foreach(range(1, 2) as $i) {
        //     User::create([
        //         'name' => $faker->firstname,
        //         'email' => $faker->safeEmail,
        //         'password' => bcrypt('secret'),
        //     ]);
        // }
    }
}

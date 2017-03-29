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
        $faker = Faker\Factory::create();
        for($ctr = 0; $ctr<=9;$ctr++) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'password' => app('hash')->make('sikret'),
                'fullname' => $faker->name,
                'confirmed' => 1,
                'api_token' => password_hash($faker->name, PASSWORD_BCRYPT, ['cost' => 11])
            ]);   
        }
    }
}

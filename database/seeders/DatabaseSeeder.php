<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->createMany([
            [
                'first_name' => 'Mostafa',
                'last_name' => 'Salem',
                'email' => 'mostafasalem25682@gmail.com',
                'password' => bcrypt('salem123')
            ],
            [
                'first_name' => 'Fake',
                'last_name' => 'Salem',
                'email' => 'mostafasalem2568@gmail.com',
                'password' => bcrypt('salem123')
            ]
        ]);

        Job::factory(10)->create();

        $this->call(CommentSeeder::class);

    }
}
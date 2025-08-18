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


        User::factory()->create([
            'first_name' => 'Mostafa',
            'last_name' => 'Salem',
            'email' => 'mostafasalem25682@gmail.com',
            'password' => 'salem123'
        ]);

        Job::factory(10)->create();

        $this->call(CommentSeeder::class);

    }
}
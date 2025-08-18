<?php

namespace Database\Factories;

use App;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Getting Started with Laravel',
                'Understanding MVC Architecture',
                'How to Use Laravel Eloquent',
                'Building a Blog with Laravel',
                'Laravel Authentication Basics',
                'Queues and Jobs in Laravel',
                'Laravel API Development Guide',
                'Blade Templating Made Easy',
                'Database Migrations and Seeders',
                'Laravel Debugging Tips',
            ]),
            'body' => fake()->randomElement([
                'Laravel is a PHP framework that makes web development simple and elegant. In this post, we cover how to install and set it up.',
                'The MVC pattern (Model-View-Controller) is the backbone of Laravel. Learn how each layer works together to keep your code clean.',
                'Eloquent ORM is Laravel’s way to interact with databases. With simple syntax, you can query, insert, update, and delete records.',
                'In this tutorial, we will build a simple blog system with posts, comments, and categories using Laravel.',
                'Queues allow you to run time-consuming tasks in the background, making your app faster. Learn how to set up and run jobs.',
            ]),
            'user_id' => App\Models\User::factory(),
        ];
    }
}
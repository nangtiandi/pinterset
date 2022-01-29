<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        Post::factory(10)->create();
        Comment::factory(20)->create();

        User::create([
           'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'phone' => '0925452345',
            'avatar' => 'default.png',
            'bio' => 'I love Art, Web Design, Photography, Design, Illustration',
            'excerpt' => 'I love Art, Web Design, Photography, Design, Illustration',
            'role' => '1'
        ]);
    }
}

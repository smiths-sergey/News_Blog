<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostView;
use App\Models\Role;
use App\Models\S3File;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        PostView::truncate();
        Comment::truncate();
        Post::truncate();
        S3File::truncate();
        User::truncate();
        Role::truncate();
        Comment::truncate();

        $this->call([
            RoleSeeder::class, //+
            UserSeeder::class, //+
            PostSeeder::class,
            PostViewSeeder::class,
            CommentSeeder::class,
        ]);


    }
}

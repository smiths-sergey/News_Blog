<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\S3File;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsers = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->get();

        $images = S3File::factory(10)->create();

        foreach (range(1, 10) as $index) {
            $admin = $adminUsers->random();
            Post::create([
                'title' => "Post Title $index",
                'content' => "Post content $index",
                'image_id' => $images->random()->id,
                'created_by' => $admin->id,
            ]);
        }
    }
}

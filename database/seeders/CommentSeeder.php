<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::has('views')->limit(5)->get();
        $users = User::all();

        foreach ($posts as $post) {
            $comments = Comment::factory(random_int(1, 5))->create([
            //$comments = Comment::count(random_int(1, 5))->create([
                'content' => "Comment on Post ID: $post->id",
                'post_id' => $post->id,
                'created_by' => $users->random()->id,
            ]);

            // Создание дочерних комментариев
            foreach ($comments as $comment) {
                Comment::factory(random_int(0, 2))->create([
                //Comment::count(random_int(0, 2))->create([
                    'content' => "Nested comment on Post ID: $post->id",
                    'parent_id' => $comment->id,
                    'post_id' => $post->id,
                    'created_by' => $users->random()->id,
                ]);
            }
        }
    }
}

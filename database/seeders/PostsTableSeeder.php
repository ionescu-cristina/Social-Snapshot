<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if ($users->count() == 0) {
            $this->command->info('Please create some users first.');
            return;
        }

        $users->each(function ($user) {
            Post::factory()->count(5)->create(['user_id' => $user->id]); 
        });
    }
}

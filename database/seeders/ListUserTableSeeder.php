<?php

namespace Database\Seeders;

use App\Models\SocialList;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $socialLists = SocialList::all();

        foreach ($users as $user) {
            $user->socialLists()->attach(
                $socialLists->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}

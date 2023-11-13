<?php

namespace Database\Seeders;

use App\Models\SocialList;
use Illuminate\Database\Seeder;

class SocialListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialList::factory()->count(10)->create(); 
    }
}

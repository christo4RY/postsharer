<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $mgmg = User::factory()->create([
            'name' => "mgmg"
        ]);
        $kyawkyaw = User::factory()->create([
            'name' => "kyawkyaw"
        ]);
        Post::factory(3)->create([
            'user_id' => $mgmg->id
        ]);
        Post::factory(3)->create([
            'user_id' => $kyawkyaw->id
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Person;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post :: factory() -> count(100) -> make() -> each(function($post) {

            $person = Person :: inRandomOrder() -> first();

            $post -> person() -> associate($person);
            $post -> save();
        });
    }
}

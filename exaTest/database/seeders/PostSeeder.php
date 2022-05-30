<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ["title" => 'My title.', "extract" => 'My extract', "content" => 'asdfgh.', "expires"	=> true, "comment"	=> false, "access"	=> 'private', "user_id"	=> 1],
            ["title" => 'Not my title.', "extract" => 'Not my extract', "content" => 'abcdef.', "expires"	=> false, "comment"	=> false, "access"	=> 'public', "user_id"	=> 2],
        ];

        DB::table('posts')->insert($posts);
    }
}

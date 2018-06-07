<?php

use Illuminate\Database\Seeder;

class TaggablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('taggables')->insert([
            'taggable_id' => 1,
            'taggable_type' => 'App\\Models\\Post',
            'tag_id' => 1,
        ]);
    }
}

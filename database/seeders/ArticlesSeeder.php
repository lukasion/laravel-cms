<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-1',
                'category_id' => 1,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-2',
                'category_id' => 1,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-3',
                'category_id' => 2,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-4',
                'category_id' => 2,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-5',
                'category_id' => 1,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-6',
                'category_id' => 2,
            ],
            [
                'name' => 'Test',
                'content' => 'Testowa treść',
                'user_id' => 1,
                'friendly_name' => 'test-7',
                'category_id' => 1,
            ],
        ]);
    }
}

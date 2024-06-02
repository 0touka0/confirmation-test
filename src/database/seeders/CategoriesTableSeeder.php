<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories1 = [
            'content' => '商品のお届けについて'
        ];
        DB::table('categories')->insert($categories1);

        $categories2 = [
            'content' => '商品の交換について'
        ];
        DB::table('categories')->insert($categories2);

        $categories3 = [
            'content' => '商品トラブル'
        ];
        DB::table('categories')->insert($categories3);

        $categories4 = [
            'content' => 'ショップへのお問い合わせ'
        ];
        DB::table('categories')->insert($categories4);

        $categories5 = [
            'content' => 'その他'
        ];
        DB::table('categories')->insert($categories5);
    }
}

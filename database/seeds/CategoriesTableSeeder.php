<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            '自然・風景',
            '街並み・建物',
            '乗り物・交通',
            '人物',
            '動物',
            '植物',
            '食べ物・飲み物',
            '物・雑貨',
            'スポーツ',
            '日本',
            '世界',
            '行事',
            'ライフ'
        ];

        for($i = 0; $i < count($arr); $i++){
            Category::create([
                'name' => $arr[$i]
            ]);
        }
    }
}

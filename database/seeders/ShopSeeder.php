<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '仙人',
            'area' => "東京都",
            'genre' => '寿司',
            'description' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
            'image_url' =>  "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);

        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => "",
            'genre' => '',
            'description' => '',
            'image_url' =>  "",
        ];
        DB::table('shops')->insert($param);
    }
}

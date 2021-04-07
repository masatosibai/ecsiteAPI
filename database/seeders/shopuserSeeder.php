<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\shop;

class shopuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {

            // postsとtagsテーブルのidカラムをランダムに並び替え、先頭の値を取得
            $set_user_id = User::select('id')->orderByRaw("RAND()")->first()->id;
            $set_shop_id = shop::select('id')->orderByRaw("RAND()")->first()->id;

            // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $post_tag = DB::table('shop_user')
                ->where([
                    ['user_id', '=', $set_user_id],
                    ['shop_id', '=', $set_shop_id]
                ])->get();

            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if ($post_tag->isEmpty()) {
                DB::table('shop_user')->insert(
                    [
                        'user_id' => $set_user_id,
                        'shop_id' => $set_shop_id,
                    ]
                );
            } else {
                $i--;
            }
        }
    }
}

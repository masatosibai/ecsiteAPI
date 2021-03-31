<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\reservation;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\shop;
use Faker\Generator as FakerGenerator;    // 追記
use Faker\Factory as FakerFactory;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create('ja_JP');
        for ($i = 0; $i < 100; $i++) {

            // postsとtagsテーブルのidカラムをランダムに並び替え、先頭の値を取得
            $set_user_id = User::select('id')->orderByRaw("RAND()")->first()->id;
            $set_shop_id = shop::select('id')->orderByRaw("RAND()")->first()->id;
            // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $reservation = DB::table('reservations')
                ->where([
                    ['user_id', '=', $set_user_id],
                    ['shop_id', '=', $set_shop_id]
                ])->get();

            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if ($reservation->isEmpty()) {
                DB::table('reservations')->insert(
                    [
                        'user_id' => $set_user_id,
                        'shop_id' => $set_shop_id,
                        "date" => $faker->date('Y/m/d'),
                        "time" => $faker->time("H:i:s"),
                        "user_num" => $faker->numberBetween($min = 1, $max = 30)
                    ]
                );
            } else {
                $i--;
            }
        }
    }
}

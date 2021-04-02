<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class shop extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, "shop_user");
    }
    public function reservations()
    {
        return $this->belongsToMany(User::class, "reservations");
    }

    public static function shopInfo_reservation(shop $shop)
    {
        return $shop->load("reservations");
    }
    public static function register(Request $request)
    {
        $item = new shop();
        $item->name = $request->name;
        $item->area = $request->area;
        $item->genre = $request->genre;
        $item->description = $request->description;
        $item->image_url = $request->imageUrl;
        $item->save();
        return response()->json([
            "message" => "作成成功",
            // "auth" => true,
            "data" => $item
        ], 200);
    }
    public static function deleteShopInfo(Request $request)
    {
        $item = shop::where('id', $request->shopID)->delete();

        if ($item) {
            return response()->json([
                'msg' => '店舗情報削除',
            ], 200);
        } else {
            return response()->json([
                'msg' => '店舗情報なし',
            ], 404);
        }
    }
}

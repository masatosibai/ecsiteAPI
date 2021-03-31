<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class reservation extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->belongsTo(shop::class, "shop_id");
    }
    public static function reserve(Request $request)
    {
        $item = new reservation();
        $item->user_id = $request->user_id;
        $item->shop_id = $request->shop_id;
        $item->date = $request->date;
        $item->time = $request->time;
        $item->user_num = $request->user_num;
        $item->save();
        return response()->json([
            "message" => "作成成功",
            "data" => $item
        ], 200);
    }
}

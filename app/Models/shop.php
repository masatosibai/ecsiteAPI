<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

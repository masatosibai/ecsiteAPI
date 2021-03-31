<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;

class ShopAdminController extends Controller
{
    //
    public function get(shop $shop)
    {

        return shop::shopInfo_reservation($shop);
    }
}

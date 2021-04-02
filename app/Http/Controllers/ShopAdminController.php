<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;
use Illuminate\Http\Client\Request as ClientRequest;

class ShopAdminController extends Controller
{
    public function index()
    {
        return shop::all();
    }
    public function store(Request $request)
    {
        return shop::register($request);
    }
    //
    public function show(shop $shop)
    {

        return shop::shopInfo_reservation($shop);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShopAdminRegisterController extends Controller
{
    public function post(Request $request)
    {

        return  User::register($request);
    }
}

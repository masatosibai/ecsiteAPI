<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LikeController extends Controller
{
    public function post(Request $request)
    {
        User::find($request->userID)->likes()->syncWithoutDetaching($request->shopID);

        return [User::find($request->userID)->likes];
    }
    public function destroy(Request $request)
    {

        return User::find($request->userID)->likes()->detach($request->shopID);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;
use Kreait\Firebase\JWT\IdTokenVerifier;

class LoginController extends Controller
{

    public function get(Request $request)
    {
        $loginJwt = $request->header("Authorization");

        $verifier = IdTokenVerifier::createWithProjectId(config("firebase.projectID"));
        try {
            $token = $verifier->verifyIdToken($loginJwt);
        } catch (IdTokenVerificationFailed $e) {
            echo $e->getMessage();
        }

        $data = $token->payload();

        $items = DB::table('users')->where('email', $data["email"])->first();
        return response()->json(['auth' => true, 'role' => $items->role, "id" => $items->id], 200);
    }
}

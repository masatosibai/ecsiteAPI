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

        $verifier = IdTokenVerifier::createWithProjectId("ecsite-91586");
        try {
            $token = $verifier->verifyIdToken($loginJwt);
        } catch (IdTokenVerificationFailed $e) {
            echo $e->getMessage();
            // Example Output:
            // The value 'eyJhb...' is not a verified ID token:
            // - The token is expired.
        }

        $data = $token->payload();

        // return $data["email"];

        // $factory = (new Factory)
        //     ->withServiceAccount('C:\Users\masato\Desktop\ecsiteAPI\ecsite-91586-firebase-adminsdk-kx0xo-bd8e2ddb1b.json');
        // // $auth = app('firebase.auth');
        // $loginJwt = $request->header("Authorization");
        // // return response()->json(
        // //     ['message' => $loginJwt],
        // //     200
        // // );

        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken($loginJwt);
        //     // $uid = $verifiedIdToken->claims()->get('sub');
        //     // $user = $this->auth->getUser($uid);
        // } catch (InvalidToken $e) {
        //     echo 'The token is invalid: ' . $e->getMessage();
        //     return $e->getMessage();
        // } catch (\InvalidArgumentException $e) {
        //     echo 'The token could not be parsed: ' . $e->getMessage();
        //     // return $e->getMessage();
        // }

        // response()->json(
        //     ['message' => $verifiedIdToken],
        //     200
        // );

        $items = DB::table('users')->where('email', $data["email"])->first();
        return response()->json(['auth' => true, 'role' => $items->role, "id" => $items->id], 200);
        // if (Hash::check($request->password, $items->password)) {
        //     return response()->json(['auth' => true, 'email' => $data["email"], "id" => $items->id], 200);
        // } else {
        //     return response()->json(['auth' => false, 'email' => $data["email"]], 200);
        // }
    }
}

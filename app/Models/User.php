<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;
use Kreait\Firebase\JWT\IdTokenVerifier;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'email',
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->belongsToMany(shop::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(shop::class, "reservations", "user_id", "shop_id")->as('resrve_info')->withPivot("id", "date", "time", "user_num");
    }
    public static function checkExist(Request $request)
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


        return  $data["email"];
        if (DB::table('users')->where('email', $data["email"])->exists()) {
            return true;
        } else {
            return false;
        }
    }
    public static function userInfo(User $user)
    {
        $user_like_reservation = $user->load("likes", "reservations");
        return $user_like_reservation;
    }
    public static function register(Request $request)
    {
        $now = Carbon::now();
        $hashed_password = Hash::make($request->password);
        $item = new User;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = $hashed_password;
        $item->created_at = $now;
        $item->updated_at = $now;
        $item->save();
        return response()->json([
            "message" => "作成成功",
            "auth" => true,
            "data" => $item
        ], 200);
    }
}

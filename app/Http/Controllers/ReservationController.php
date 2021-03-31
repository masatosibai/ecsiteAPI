<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;

class ReservationController extends Controller
{
    public function post(Request $request)
    {
        return  reservation::reserve($request);
    }
    public function destroy(reservation $reservation)
    {
        $item = reservation::where('id', $reservation->id)->delete();
        if ($item) {
            return response()->json(
                ['message' => ' deleted successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => ' not found'],
                404
            );
        }
    }
}

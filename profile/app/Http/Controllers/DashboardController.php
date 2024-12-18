<?php

namespace App\Http\Controllers;
use App\Models\bus;
use App\Models\bususer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
//        $user = Auth::user();
//
//        $buses = $user->buses;
        //nog veranderen en betere database connections maken
        $buses = bususer::join('buses', 'buses.id', '=', 'bus_user.bus_id')
            ->join('festivals', 'festivals.id', '=', 'buses.festivals_id')
            ->where('bus_user.user_id', Auth::id())
            ->get();
        return view('dashboard', ['buses' => $buses]);
    }
}

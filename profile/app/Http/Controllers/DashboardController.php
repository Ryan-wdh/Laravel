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
        return view('dashboard', ['buses' => $buses]);
    }
}

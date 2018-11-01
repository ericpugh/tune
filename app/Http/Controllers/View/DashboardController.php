<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Caption;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the the user's account page.
     *
     * @return \Illuminate\Http\Response
     */
    public function account(User $user)
    {
      return view('dashboard.account', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Caption;
use App\User;
use Illuminate\Support\Facades\Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // @TODO: Only return tasks belonging to a user. (need relationship on Model) then use Caption->with('user');
        $captions = Caption::all()->sortByDesc('updated_at');
        return view('dashboard.index', ['captions' => $captions]);
    }

    /**
     * Show a Caption record.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCaption(Caption $caption)
    {
      return view('caption.show', compact('caption'));
    }

    /**
     * User account page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccount(User $user)
    {
      return view('dashboard.account', compact('user'));
    }

}

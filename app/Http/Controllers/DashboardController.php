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
      $userId = Auth::user()->getAuthIdentifier();
      $token = DB::table('oauth_access_tokens')->where('user_id', '=', $userId)->first();
//      dd($userId);
      // @TODO: Only return tasks belonging to a user.
        $captions = Caption::all()->sortByDesc('updated_at');
        return view('dashboard.index', ['captions' => $captions, 'token' => $token->id]);
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
     * Create a user access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function createToken(User $user)
    {
      // @TODO: currently tokens expire after one year, should we increase.
      // @TODO: this doesn't actually create the usable token, see web.php routes for test route to output a token.
      $token = $user->createToken('Timekeeper Access Token')->accessToken;
      return redirect('dashboard')->with('status', 'Timekeeper Access Token created!');
    }

}

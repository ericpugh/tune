<?php

namespace App\Http\Controllers\View;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

  /**
   * Show the the user's account page.
   *
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    return view('user.show', compact('user'));
  }

}

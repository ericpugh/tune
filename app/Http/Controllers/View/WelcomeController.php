<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('welcome');
    }

}

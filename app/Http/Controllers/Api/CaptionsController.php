<?php

namespace App\Http\Controllers\Api;

use App\Caption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CaptionsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['index', 'show']]);
    $guarded = ['id', 'created_at', 'updated_at'];
  }

  /**
   * Display a listing of the resource.
   *
   * @param  \App\Caption  $caption
   * @return \Illuminate\Http\Response
   */
  public function index(Caption $caption)
  {
    $response = new Response(Caption::all());
    return $response;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Caption  $caption
   * @return \Illuminate\Http\Response
   */
  public function show(Caption $caption)
  {
    $response = new Response($caption);
    return $response;
  }

  /**
   * Update the caption.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Caption  $caption
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Caption $caption)
  {
    $this->validate($request, [
      'media_current_time' => 'required|string',
    ]);
    $caption->media_current_time = $request->get('media_current_time');
    $caption->save();

    return response()->json(['success' => $caption], 200);
  }

}

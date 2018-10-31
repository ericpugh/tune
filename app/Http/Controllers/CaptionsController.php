<?php

namespace App\Http\Controllers;

use App\Caption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $response = new Response(Caption::all());
      return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('caption.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'caption' => 'required',
        'media_duration' => 'required',
      ]);
      $caption = new Caption();
      $caption->name = $request->get('name') ? $request->get('name') : 'Untitled';
      $caption->description = $request->get('description') ? $request->get('description') : '';
      $caption->caption = $request->get('caption');
      $caption->media_duration = $request->get('media_duration') ? $request->get('media_duration') : 0;
      $caption->media_current_time = 0;
      $caption->user_id = $request->user()->id;
      $caption->save();

      return redirect('dashboard')->with('status', 'Caption created!');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caption  $caption
     * @return \Illuminate\Http\Response
     */
    public function edit(Caption $caption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caption  $caption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caption $caption)
    {
      $time = $request->get('media_current_time');
      $caption->media_current_time = $time;
      return response()->json($caption, 200);
    }

    /**
     * Update the caption media_current_time field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caption  $caption
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentTime(Request $request, Caption $caption)
    {
//      return response()->json(['success' => $caption], 200);

      $this->validate($request, [
        'media_current_time' => 'required|string',
      ]);
      $caption->media_current_time = $request->get('media_current_time');
      $caption->save();

      return response()->json(['success' => $caption], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caption  $caption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caption $caption)
    {
        $caption->delete();
        return redirect('dashboard')->with('status', 'Caption removed!');

    }
}

<?php

namespace App\Http\Controllers\View;

use App\Caption;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Podlove\Webvtt\Parser;
use Podlove\Webvtt\ParserException;

class CaptionsController extends Controller
{
  /**
   * @var \Podlove\Webvtt\Parser $vttParser
   */
  protected $vttParser;

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['showEmbed']]);
    $guarded = ['id', 'created_at', 'updated_at'];
    $this->vttParser = new \Podlove\Webvtt\Parser();
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /** @var \App\User $user */
      $user = \Auth::user();
      $captions = $user->captions;
      return view('caption.index', ['captions' => $captions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $languages = Language::all();
      return view('caption.create', ['languages' => $languages]);
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
      $caption->language_id = $request->get('language');
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
      return view('caption.show', compact('caption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caption  $caption
     * @return \Illuminate\Http\Response
     */
    public function edit(Caption $caption)
    {
      $languages = Language::all();
      $user = \Auth::user();
      if ($caption->user->id === $user->id) {
        return view('caption.edit',['caption' => $caption, 'languages' => $languages]);
      }
      else {
        abort(404);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Caption $caption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caption $caption)
    {
      $this->validate($request, [
        'name' => 'required',
        'caption' => 'required',
        'media_duration' => 'required',
      ]);
      $caption->name = $request->get('name') ? $request->get('name') : 'Untitled';
      $caption->description = $request->get('description') ? $request->get('description') : '';
      $caption->caption = $request->get('caption');
      $caption->media_duration = $request->get('media_duration') ? $request->get('media_duration') : 0;
      $caption->user_id = $request->user()->id;
      $caption->language_id = $request->get('language');
      $caption->save();

      return redirect('dashboard/captions/' . $caption->id)->with('status', sprintf('Caption <em>%s</em> updated!', $caption->name));
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

  /**
   * Display the specified resource as an embed.
   *
   * @param  \App\Caption  $caption
   * @return \Illuminate\Http\Response
   */
  public function showEmbed(Caption $caption)
  {
    // Get caption and append an ending line break.
    $content = $caption->caption . PHP_EOL;
    $parsed = $this->vttParser->parse($content);
    $vtt = isset($parsed['cues']) ? $parsed['cues'] : [];
    $updated_time = strtotime($caption->updated_at);
    return view('caption.embed', ['caption' => $caption, 'vtt' => $vtt, 'updated' => $updated_time]);
  }

}

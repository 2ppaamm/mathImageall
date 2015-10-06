<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Track;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks=Track::with('user')->public()->get();
        flash($flash_message = isset($tracks) ? 'Listing all the tracks available on the system' :
            'Error in retrieving tracks');
        return view('tracks.index', compact ('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageController $imageController)
    {
        $track = new track($request->all());
        $track['image'] = $request['image']!=null ? $imageController->store($request->file('image'), 'tracks', $track->track):null;
        $track=Auth::user()->tracks()->save($track);
        return redirect('tracks/'.$track->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "hello";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        if (Request::ajax())
        {
            $track = Track::findOrFail(Request::get('pk'));
            $track[Request::get('name')] = Request::get('value');
            $track->update();
            return response()->json(['track' => $track, 200], 200);        }
        else {
            return redirect('tracks/'.$track->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
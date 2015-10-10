<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Level;
use Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::with('user')->with('status')->public()->get();
        flash($flash_message = isset($levels) ? 'Listing all the levels available on the system' :
            'Error in retrieving levels');
        return view('levels.index', compact ('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Request::ajax()){
            return view('levels.editForm', compact('level'))->render();
        }
        else return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Request::ajax()){
            return Auth::user()->levels()->save($level=new level(Request::all()));
        } else {
            Auth::user()->levels()->save($level=new level(Request::all()));
            return redirect('levels/'.$level->id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {

        if (Request::ajax()) {
            if (null == (Request::all())) {
                return response()->json(['response' => 'error in level update', 404], 404);
            } else {
                $level = Level::findOrFail(Request::get('pk'));
                $level[Request::get('name')] = Request::get('value');
                $level->update();
                return response()->json(['level' => $level, 200], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        if (Request::ajax()) {
            return Level::findOrFail($level->id) ? Level::destroy($level->id):null;
        }
        else {

        }
        Level::findOrFail($level->id) ? Level::destroy($level->id):null;
        flash('Level is deleted');
        return redirect('levels');
    }
}
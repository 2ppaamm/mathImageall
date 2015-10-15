<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Skill;
use Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::with('user')->with('status')->public()->get();
        flash($flash_message = isset($skills) ? 'Listing all the skills available on the system' :
            'Error in retrieving skills');
        return view('skills.index', compact ('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Request::ajax()){
            return view('skills.editForm', compact('skill'))->render();
        }
        else return view('skills.create');
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
            return Auth::user()->skills()->save($skill=new skill(Request::all()));
        } else {
            Auth::user()->skills()->save($skill=new skill(Request::all()));
            return redirect('skills/'.$skill->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        if (Request::ajax()) {
            if (null == (Request::all())) {
                return response()->json(['response' => 'error in skill update', 404], 404);
            } else {
                $skill = Skill::findOrFail(Request::get('pk'));
                $skill[Request::get('name')] = Request::get('value');
                $skill->update();
                return response()->json(['skill' => $skill, 200], 200);
            }
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

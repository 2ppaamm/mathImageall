<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Difficulty;
use Illuminate\Support\Facades\Auth;

class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $difficulties = Difficulty::with('user')->with('status')->public()->get();
        flash($flash_message = isset($difficulties) ? 'Listing all the difficulties available on the system' :
            'Error in retrieving difficulties');
        return view('difficulties.index', compact ('difficulties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Request::ajax()){
            return view('difficulties.editForm', compact('difficulty'))->render();
        }
        else return view('difficulties.create');
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
            return Auth::user()->difficulties()->save($difficulty=new difficulty(Request::all()));
        } else {
            Auth::user()->difficulties()->save($difficulty=new difficulty(Request::all()));
            return redirect('difficulties/'.$difficulty->id);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Difficulty $difficulty)
    {

        if (Request::ajax()) {
            if (null == (Request::all())) {
                return response()->json(['response' => 'error in difficulty update', 404], 404);
            } else {
                $difficulty = Difficulty::findOrFail(Request::get('pk'));
                $difficulty[Request::get('name')] = Request::get('value');
                $difficulty->update();
                return response()->json(['difficulty' => $difficulty, 200], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Difficulty $difficulty)
    {
        if (Request::ajax()) {
            return Difficulty::findOrFail($difficulty->id) ? Difficulty::destroy($difficulty->id):null;
        }
        else {

        }
        Difficulty::findOrFail($difficulty->id) ? Difficulty::destroy($difficulty->id):null;
        flash('Difficulty is deleted');
        return redirect('difficulties');
    }
}

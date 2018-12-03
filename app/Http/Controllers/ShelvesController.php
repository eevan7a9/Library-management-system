<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Shelf;
use Illuminate\Validation\Validator;

class ShelvesController extends Controller
{
    public function __construct()
    {
        /**
         * redirect unauthenticated users
         */
        $this->middleware('auth');
        $this->middleware('not_standard');
        $this->middleware('only_admin')->except('create', 'store', 'index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 2) {
            $shelves = Shelf::all();
        }else{
            $shelves = Shelf::all()->where('user_id', Auth::user()->id);
        }

        return view('shelves.index')->with('shelves', $shelves);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shelves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|unique:shelves',
        ]);

        $shelves = New Shelf();
        $shelves->name = $request->input('name');
        $shelves->user_id = $user->id;
        $shelves->status = 1;
        $shelves->save();

        return redirect('shelves')->with('success','New Shelf '.$shelves->name.' has been added!');
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
        $shelves = Shelf::find($id);
        return view("shelves.edit")->with('shelves', $shelves);
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

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $status_input = $request->input('status');
        if (!isset($status_input)) {
            $status = 0;
        }else{
            $status = 1;
        }
        $shelves = Shelf::find($id);
        $shelves->name = $request->input("name");
        $shelves->status = $status;
        $shelves->save();
        return redirect("shelves")->with("success", "Shelves ".$request->input('name'). "have been Updated!");
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

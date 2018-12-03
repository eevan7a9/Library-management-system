<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Publisher;
use Illuminate\Validation\Validator;

class PublishersController extends Controller
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
            $publishers = Publisher::all();
        }else{
            $publishers = Publisher::all()->where('user_id', Auth::user()->id);
        }

        return view('publishers.index')->with('publishers', $publishers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publishers.create');
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
            'name' => 'required|unique:publishers',
        ]);

        $publishers = New Publisher();
        $publishers->name = $request->input('name');
        $publishers->user_id = $user->id;
        $publishers->save();

        return redirect('publishers')->with('success','New Publisher '.$publishers->name.' has been added!');
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
        $publishers = Publisher::find($id);
        return view("publishers.edit")->with('publishers', $publishers);
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
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|unique:publishers',
        ]);

        $publishers = Publisher::find($id);
        $publishers->name = $request->input('name');
        $publishers->save();

        return redirect('publishers')->with('success','Publisher '.$publishers->name.' have been Updated!');
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

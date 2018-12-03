<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('not_standard', ['except' => ['show',]]);
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
            $authors = Author::all();
        }else{
            $authors = Author::all()->where('user_id', Auth::user()->id);
        }

        return view('authors.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'name' => 'required|unique:authors',
        ]);

        $authors = New Author;
        $authors->name = $request->input('name');
        $authors->user_id = $user->id;
        $authors->save();


        return redirect('authors')->with('success', 'New Author ' .$authors->name. ' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = Author::findOrFail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::find($id);
       return view("authors.edit")->with('authors', $authors);
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
            'name' => 'required|unique:authors',
        ]);
       $authors = Author::find($id);

       $authors->name = $request->input("name");
       $authors->save();

       return redirect("authors")->with("success", "Author ".$request->input("name"). "have been Updated.");
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

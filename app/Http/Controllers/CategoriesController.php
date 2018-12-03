<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        /**
         * get authenticated user
         */
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();

            return $next($request);
        });

        /**
          * redirect unauthenticated users
          */
         $this->middleware('auth');
         // $this->middleware('not_standard', ['except' => ['show']]);
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
            $categories = Category::all();
        }else{
            $categories = Category::all()->where('user_id', Auth::user()->id);
        }

        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = New Category();
        $category->name = $request->input('name');
        $category->status = 1;
        $category->user_id = $this->user->id;
        $category->save();


        return redirect('categories')->with('success','New Category '.$category->name.' has been added!');

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
        $categories = Category::find($id);
        return view("categories.edit")->with('categories', $categories);
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
        $categories = Category::find($id);
        $categories->name = $request->input("name");
        $categories->status = $status;
        $categories->save();
        return redirect("categories")->with("success", "Category ".$request->input('name'). "have been Updated!");
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

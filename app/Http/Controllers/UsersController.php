<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Borrower;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('not_standard');
        $this->middleware('only_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $me = Auth::user();
        $users = User::all()->where('id', '!=', $me->id);
        return view("users.index")->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //located at Register Controller
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        $current_borrowed = Borrower::all()->where('status', '=', 1)->where('user_id', '=', $id);
        $total_borrowed = Borrower::all()->where('user_id', '=', $id);
        return view("users.show")
            ->with('users', $users)
            ->with('borrowed', $current_borrowed)
            ->with('total_borrowed', $total_borrowed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view("users.edit")->with('users', $users);
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
        return redirect('/users')->with('error', "This action is restricted for this Demo Project");
        // $users = User::find($id);

        // $users->first_name = $request->input("first_name");
        // $users->last_name = $request->input("last_name");
        // $users->username = $request->input("username");
        // $users->email = $request->input("email");
        // $users->status = $request->input('user_status');
        // $users->user_type = $request->input('user_type');
        // $users->save();

        // return redirect('/users')->with('success', "User " . $users->username . " have been Updated!!!");
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

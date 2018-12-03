<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Borrower;
use App\Book;
use App\Shelf;
use DB;


class ApplicationController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
        $this->middleware('not_standard');
        $this->middleware('only_admin');
    }

	public function index()
   	{
        $users = User::all()->where('status', 1);
	    $books_count = DB::table('books_number')->sum('books_total_count');
	    $borrowers = User::all()->where('status', 1);
        $shelves = Shelf::all();

        if (Auth::user()->user_type == 2) {
            $books = Book::all();
        }else{
            $books = Book::all()->where('user_id', Auth::user()->id);
        }
	   return view('application')
	   ->with('users', $users)
       ->with('books', $books)
       ->with('books_count', $books_count)
       ->with('shelves', $shelves)
	   ->with('borrowers', $borrowers);
   	}
}

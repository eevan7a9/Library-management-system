<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Borrower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Issuer;
use Illuminate\Support\Facades\Hash;
use App\Receive;


class BorrowersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('not_standard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 2) {
            $borrowers = Borrower::all();
        }else{
            $borrowers = Borrower::all()->where('librarian_id', Auth::user()->id);
        }

        return view('borrowers.index')->with('borrowers', $borrowers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrowers.create');
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        return view('borrowers.return');
    }

    public function return_index(Request $request){
        $validated = $request->validate([
            'ISBN' => 'required',
            'email' => 'required'
        ]);
        $isbn = $request->input('ISBN');
        $email = $request->input('email');

        if (DB::table('books')->where('ISBN', '=', $isbn)->exists()) {
           if (DB::table('users')->where('email', '=', $email)->exists()) {
                $users = User::where('email', '=', $email)->first();
                $books = Book::where('ISBN', '=', $isbn)->first();

                $borrowers = Borrower::all()->where('book_id', '=', $books->id)->where('user_id', '=', $users->id)->Where('status', '=', 1);
                if (count($borrowers) < 1) {
                    return redirect()->back()->withErrors('This Email '.$email.' and this book'. $isbn . ' is not from any registered Borrowers')->withInput();
                }
                return view('borrowers.index')->with('borrowers', $borrowers);
           }else{
               return redirect()->back()->withErrors('This Email '.$email.' is not from any registered Users')->withInput();
           }
        }else{
            return redirect()->back()->withErrors('This '.$isbn.' is not from any registered Books')->withInput();
        }

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
            'email' => 'required',
            'ISBN' => 'required',
            'return_date' => 'required',

        ]);
        $return_date = $request->input('return_date');
        $email = $request->input('email');
        $isbn = $request->input('ISBN');
        $librarian = Auth::user();

        //check if email and ISBN exists
        if (DB::table('users')->where('email', $email)->exists())
        {
            $users = DB::table('users')->where('email', $email)->first();
            if (DB::table('books')->where('ISBN', $isbn)->exists())
            {
                $books = DB::table('books')->where('ISBN', $isbn)->first();

                $borrowers = New Borrower();

                $borrowers->user_id = $users->id;
                $borrowers->book_id = $books->id;
                $borrowers->number_of_books = 1;
                $borrowers->return_date = $request->input('return_date');
                $borrowers->librarian_id = $librarian->id;
                $borrowers->status = 1;
                $borrowers->save();

                /**Subtract the number of books borrowed to the available number of books*/
                $books_number = DB::table('books_number')->where('book_id', $borrowers->book_id)->first();
                $new_available_books = $books_number->books_available - $borrowers->number_of_books;
                DB::table('books_number')->where('book_id', $borrowers->book_id)->update(['books_available' => $new_available_books]);

                return redirect('borrowers')->with('success', 'Borrower '.$users->email.' and '.$books->name.' have been added to Borrowers table');

            }
            else
            {
                return redirect('borrowers/create')->with('error','This ISBN is not from any registered Books');
            }
        }else{
            return redirect('borrowers/create')->with("error","User Email is not from registered User");
        }
        // return redirect('/borrowers')->with('success','new record added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrowers = Borrower::find($id);
        return view("borrowers.edit")->with('borrowers', $borrowers);
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
            'email' => 'required',
            'ISBN' => 'required',
            'password' => 'required'
        ]);
        $current_users = Auth::user();
        $input_password = $request->input('password');
        $current_password = $current_users->password;

        if (Hash::check($input_password, $current_password)) {
            $borrowers = Borrower::find($id);
            $borrowers->status = 0;
            $borrowers->save();

            /** Increment the number of available books base on number of returned books*/
            $returned_books = 1;
            $returned_books_id = $borrowers->book_id;
            $books_number = DB::table('books_number')->where('book_id', $returned_books_id)->first();
            $new_available_books = $books_number->books_available + $returned_books;

            DB::table('books_number')->where('book_id', $returned_books_id)->update(['books_available' => $new_available_books]);

            $receivers = New Receive();
            $receivers->user_id = $current_users->id;
            $receivers->book_id = $returned_books_id;
            $receivers->borrower_id = $borrowers->id;
            $receivers->save();

            return redirect('borrowers')->with('success', 'Borrowed book '.$borrowers->books->name. 'have been returned');
            echo $returned_books;
        }else{
            return redirect()->back()->withErrors('Invalid Password')->withInput();
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

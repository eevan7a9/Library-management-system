<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
use App\Shelf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use DB;


class BooksController extends Controller
{

    public function __construct()
    {
        /**
         * redirect unauthenticated users
         */
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('not_standard')->except('show');
        $this->middleware('only_admin')->except('create', 'store', 'index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 2) {
            $books = Book::all();
        }else{
            $books = Book::all()->where('user_id', Auth::user()->id);
        }

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('created_at', 'asc')->get();
        $categories = Category::Where('status', '=', 1)->orderBy('name', 'Asc')->get();
        $publishers = Publisher::orderBy('name')->get();
        $shelves = Shelf::Where('status', '=', 1)->orderBy('created_at')->get();

        return view('books.create')
                ->with('authors', $authors)
                ->with('categories', $categories)
                ->with('publishers', $publishers)
                ->with('shelves', $shelves);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = Auth::user();

        $validated = $request->validate([
            'name' => 'required',
            'ISBN' => 'required|unique:books',
            'number_of_books' => 'required|numeric',
        ]);

        $number_of_books = $request->input('number_of_books');

        $books = New Book;
        $books->name = $request->input("name");
        $books->category_id = $request->input('book_category');
        $books->author_id = $request->input('book_author');
        $books->shelf_id = $request->input('book_shelf');
        $books->publisher_id = $request->input('book_publisher');
        $books->ISBN = $request->input('ISBN');
        $books->book_description = $request->input('book_description');
        $books->key_word = $request->input('key_word');
        $books->user_id = $users->id;
        $books->save();

        DB::table('books_number')->insert([
            ['book_id' => $books->id, 'books_total_count' => $number_of_books, 'books_available' => $number_of_books]
        ]);
        
        return redirect('books')->with('success', 'New book '.$books->name.' have been added');
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::findOrFail($id);
        $books_number = DB::table('books_number')->where('book_id', $id)->first();
        return view('books.show')->with('books', $books)->with('books_number', $books_number);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::orderBy('created_at', 'asc')->get();
        $categories = Category::orderBy('name')->get();
        $publishers = Publisher::orderBy('name')->get();
        $shelves = Shelf::all();
        $numbers = DB::table('books_number')->where('book_id', $id)->first();
        $borrowed = $numbers->books_total_count - $numbers->books_available;

        $books = Book::find($id);
        return view("books.edit")
                ->with('authors', $authors)
                ->with('categories', $categories)
                ->with('publishers', $publishers)
                ->with('shelves', $shelves)
                ->with('numbers', $numbers)
                ->with('borrowed', $borrowed)
                ->with("books", $books);

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
            'ISBN' => 'required|unique:books',
            'available' => 'required|numeric',
            // 'number_of_books' => 'required',

        ]);

        $users = Auth::user();
        $books = Book::find($id);

        $new_available = $request->input('available');
        $numbers = DB::table('books_number')->where('book_id', $books->id)->first();
        $borrowed = $numbers->books_total_count - $numbers->books_available;
        $new_total = $borrowed + $new_available;

        DB::table('books_number')->where('book_id', $id)->update(['books_total_count' => $new_total, 'books_available' => $new_available]);

        $books->name = $request->input('name');
        $books->ISBN = $request->input('ISBN');
        $books->category_id = $request->input('book_category');
        $books->author_id = $request->input('book_author');
        $books->shelf_id = $request->input('book_shelf');
        $books->publisher_id = $request->input('book_publisher');
        $books->book_description = $request->input('book_description');
        $books->key_word = $request->input('key_word');
        $books->user_id = $users->id;
        $books->save();

        return redirect('books')->with('success', 'Book '.$books->name.' have been Updated');

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

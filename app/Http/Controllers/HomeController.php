<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DB;
use App\Book;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id','DESC')->paginate(3);
        return view('home')->with('books', $books);
    }

    public function search_results(Request $request){

        $validated = $request->validate(['books' => 'required|min:4',]);
        $searched = $request->input('books');
        if(!isset($searched)) {
            return redirect('searched');
        }
        $searching = TRUE;
        $books = Book::where('name', 'LIKE', '%'.$searched.'%')
                                ->OrWhere('ISBN', 'LIKE', '%'.$searched.'%')
                                ->OrWhere('key_word', 'LIKE', '%'.$searched.'%')->get();

        // self.cur.execute("""SELECT id, title, topic, content, created_at, modified_at FROM noteTbl
        // WHERE (title LIKE '{}%' OR topic LIKE '{}%') AND created_by = ?""".format(value, value),
        //                  (user_id,))
        return view('searched')->with('books', $books)->with('searching', '$searching');
    }
}

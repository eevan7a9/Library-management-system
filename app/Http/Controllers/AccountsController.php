<?php
namespace App\Http\Controllers;
use App\Author;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use File;
use Illuminate\Support\Facades\Hash;
use App\Borrower;
use App\Issuer;
use App\Receiver;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $users = Auth()->user();
            $users_created = User::find($users->id);/** get the created author, categories, etc... **/

            $issued = Borrower::all()->where('librarian_id', '=', $users->id);/** get issued books from borrowers table */
            $borrowed = Borrower::all()->where('user_id', '=', $users->id);
            $borrowed_returned = Borrower::all()->where('user_id', '=', $users->id)->where('status', '=', '0');
            $currently_borrowed = Borrower::all()->where('user_id', '=', $users->id)->where('status', '=', '1');
            
            return view('accounts.index')
                ->with('users', $users)
                ->with('authors', $users_created->authors)
                ->with('categories', $users_created->categories)
                ->with('publishers', $users_created->publishers)
                ->with('shelves', $users_created->shelves)
                ->with('books', $users_created->books)
                ->with('borrowers', $borrowed)
                ->with('borrowed_returned', $borrowed_returned)
                ->with('currently_borrowed', $currently_borrowed)
                ->with('issued', $issued)
                ->with('receives', $users_created->receives);

        }else{
        return view('auth.register');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $users = User::find($id);
        return view("accounts.edit")->with('users', $users);
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
        $current_user = Auth::user();
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);
        $new_password = $request->input("password");

        if (isset($new_password)) { /** Check if user wants a new password */
            $users = User::find($id);
            $db_old_password = $users->password;
            $confirm_old_password = $request->input("old_password");
            if (Hash::check($confirm_old_password, $db_old_password)) {
                $confirm_password = $request->input("password_confirmation");
                if ($new_password === $confirm_password) {

                    $users->first_name = $request->input("first_name");
                    $users->last_name = $request->input("last_name");
                    $users->username = $request->input("username");
                    $users->email = $request->input("email");
                    $users->password = Hash::make($confirm_password);
                    $users->save();

                    Auth::logout();
                    return redirect("/accounts")->with("success", "You're Password Have been Updated");


                }else{
                    return redirect()->back()->withErrors("Failed, New Password Confirmation")->withInput();
                }
            }else{
               return redirect()->back()->withErrors("Failed, Old Password Confirmation")->withInput();
            }
        }
        else{
                $users = User::find($id);
                $users->first_name = $request->input("first_name");
                $users->last_name = $request->input("last_name");
                $users->username = $request->input("username");
                $users->email = $request->input("email");
                // $users->status = $request->input('user_status');
                // $users->user_type = $request->input('user_type');
                $users->save();

                return redirect('/accounts')->with('success', "User ".$users->username. " have been Updated!!!");
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

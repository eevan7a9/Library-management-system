<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    public function books(){
        return $this->belongsTo('App\Book', 'book_id');
    }
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function librarians(){
        return $this->belongsTo('App\User', 'librarian_id');
    }
    

}

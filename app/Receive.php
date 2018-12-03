<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    public function books(){
        return $this->belongsTo('App\Book', 'book_id');
    }
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function borrowers(){
        return $this->belongsTo('App\User', 'borrower_id');
    }
}

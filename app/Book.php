<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function authors(){
        return $this->belongsTo('App\Author', 'author_id');
    }
    public function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function publishers(){
        return $this->belongsTo('App\Publisher', 'publisher_id');
    }
    public function shelves(){
        return $this->belongsTo('App\Shelf', 'shelf_id');
    }
    public function borrowers(){
        return $this->hasMany('App\Borrower');
    }
    public function issuers(){
        return $this->hasMany('App\Issuer');
    }
}

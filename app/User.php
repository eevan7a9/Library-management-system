<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'password', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *d
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books(){
        return $this->hasMany('App\Book');
    }
    public function authors(){
        return $this->hasMany('App\Author');
    }
    public function categories(){
        return $this->hasMany('App\Category');
    }
    public function publishers(){
        return $this->hasMany('App\Publisher');
    }
    public function shelves(){
        return $this->hasMany('App\Shelf');
    }
    public function borrowers(){
        return $this->hasMany('App\Borrower', 'user_id');
    }
    public function librarians(){
        return $this->hasMany('App\Borrower', 'librarian_id');
    }
    public function receives(){
        return $this->hasMany('App\Receive', 'user_id');
    }

}

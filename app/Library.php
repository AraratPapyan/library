<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'libraries';

    protected $fillable =[

        'name',
        'director',
        'street_address',
        'city',
        'country',
        'phone_number',
        'email',
    ];

    public $rules = [
        'name' => 'required',
        'director' => 'required',
        'street_address' => 'required',
        'city' => 'required',
        'country' => 'required',
        'phone_number' => 'required',
        'email' => 'required',
    ];

    public function libraryBook()
    {
        return $this->hasMany('App\LibraryBook');
    }


    public function libraryBooks()
    {
        return $this->belongsToMany('App\Book', 'library_books', 'library_id','book_id');
    }



}

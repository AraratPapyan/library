<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable =[

        'full_name',
        'date_of_birth',
        'biography',
    ];
    public $rules = [
        'full_name' => 'required',
        'date_of_birth' => 'required',
        'biography' => 'required',

    ];

    public function authorBook()
    {
        return $this->hasMany('App\AuthorBook');
    }



}

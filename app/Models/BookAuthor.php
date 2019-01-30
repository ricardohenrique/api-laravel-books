<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookAuthor extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'books_authors';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'book_id',
        'author_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

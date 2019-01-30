<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'books';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'isbn',
        'title',
        'cover',
        'price',
        'level_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

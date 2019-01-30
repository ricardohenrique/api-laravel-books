<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookDiscipline extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'books_disciplines';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'book_id',
        'discipline_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

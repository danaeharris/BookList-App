<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'open_lib_id'
    ];

    //Specifying the many-to-many relationship with Authors and its intermediate table.
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors',  'book_id', 'author_id');
    }

    //protected $table = 'books';
    //protected $primaryKey = 'id';
    //public $incrementing = true;
    //public $timestamps = false;
}

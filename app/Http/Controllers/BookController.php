<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Author;
use App\Models\Book;

class BookController extends BaseController
{
    public function author($id)
    {
        $dbAuthor = Author::find($id);
        //TODO: get the book and its authors from the OpenLibrary API if we don't have it.
        //var_dump($dbAuthor);
        $pageData = [
            "author" => $dbAuthor,
            "books" => $dbAuthor->books
        ];

        // var_dump($pageData);
        return view("author")->with($pageData);
    }

    public function book($id)
    {
        //Get the book from the id.
        $dbBook = Utilities::getBook($id);

        //Return a view with the book data.
        $pageData = [
            "book" => $dbBook,
            "authors" => $dbBook->authors
        ];
        return view("book")->with($pageData);
    }

    public function add($id)
    {
        //TODO: add a book to your list.
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
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
        $dbBookId = $dbBook->id;

        $userId = Auth::id();

        $dbUser = User::find($userId);

        $dbUserBook = UserBook::where([['book_id', '=', $dbBookId], ['user_id', '=', $userId]])->first();


        //Check if a UserBook record exists for this user and this book.

        //Return a view with the book data.
        $pageData = [
            "book" => $dbBook,
            "authors" => $dbBook->authors,
            "userBook" => $dbUserBook,
            //pass that userbook record to the view.
        ];
        return view("book")->with($pageData);
    }

}
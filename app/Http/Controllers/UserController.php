<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\UserBook;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use \Datetime;

class UserController extends Controller
{
    public function user($id)
    {
        $dbUser = User::find($id);
        //TODO: get the book and its authors from the OpenLibrary API if we don't have it.
        //var_dump($dbAuthor);
        $pageData = [
            "name" => $dbUser->name,
            "books" => $dbUser->books,
        ];

        // var_dump($dbUser->books);
        return view("user")->with($pageData);
    }

    public function add($id)
    {
      //check if the book is already on the user's list
      //add the book to the user's list if it is not
      //redirect to the book page
      $userId = Auth::id();

      //$userBookExists = UserBook::where([['book_id', '=', $id], ['user_id', '=', $user->id]])->exists();
    //   if (!$userBookExists) {

    //   }
      $dbBook = Book::find($id);

      $userBook = UserBook::firstOrCreate(
        ['book_id' => $id, 'user_id' => $userId],
        [
            'date_added' => 0,
            'date_started' => 0,
            'date_completed' => 0,
            'status' => 'unread',
            'open_lib_id' => '',
            'rating' => 0,
        ]
    );

    return redirect()->route('book', ['id' => $dbBook->open_lib_id]);
    }

    public function remove($id)
    {

      $userId = Auth::id();

      $dbBook = Book::find($id);
      $userBook = UserBook::where([['book_id', '=', $id], ['user_id', '=', $userId]])->first();
      $userBook->delete();

    return redirect()->route('book', ['id' => $dbBook->open_lib_id]);
    }
}
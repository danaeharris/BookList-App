<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\Author;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view("home");
    }

    
    // public function search(Request $request)
    // {
    //     $query = $request->query("q");

    //     $results = $this->CallAPI(
    //         "GET",
    //         "http://openlibrary.org/search.json?q=" .
    //             str_replace(" ", "+", $query)
    //     );

    //     $pageData = [
    //         "results" => $results,
    //         "query" => $query,
    //     ];
    //     // var_dump($pageData);
    //     return view("search")->with($pageData);
    // }


    // public function author($id)
    // {
    //     $dbAuthor = Author::find($id);
    //     //TODO: get the book and its authors from the OpenLibrary API if we don't have it.

    //     $pageData = [
    //         "author" => $dbAuthor,
    //         "books" => $dbAuthor->books
    //     ];

    //     // var_dump($pageData);
    //     return view("author")->with($pageData);
    // }

    // public function book($id)
    // {
    //     $dbBook = Book::where("open_lib_id", "=", $id)->first();
    //     //TODO: get the book and its authors from the OpenLibrary API if we don't have it.

    //     $pageData = [
    //         "book" => $dbBook,
    //         "authors" => $dbBook->authors
    //     ];

    //     // var_dump($pageData);
    //     return view("book")->with($pageData);
    // }

    
    // public function add($id) {

    //     //Get the book from the Open Library API.
    //     $olBookResults = $this->CallAPI(
    //         "GET",
    //         "https://openlibrary.org/works/" . $id . ".json"
    //     );

    //     //Add the book to the database
    //     $bookDescription = "Open Library does not have a description for this book.";

    //     if(array_key_exists("description", $olBookResults) && is_array($olBookResults["description"])) {
    //         $bookDescription = $olBookResults["description"]["value"];
    //     } else if(array_key_exists("description", $olBookResults)) {
    //         $bookDescription = $olBookResults["description"];
    //     }


    //     if(array_key_exists("covers", $olBookResults) && is_array($olBookResults["covers"])) {
    //         $bookCover = $olBookResults["covers"][0];
    //     } else {
    //         $bookCover = '';
    //     }

    //     $dbBook = Book::updateOrCreate(
    //             ['open_lib_id' => $id,],
    //             [
    //                 'title' => $olBookResults['title'], 
    //                 'description' => $bookDescription,
    //                 "image_url" => $bookCover ? "https://covers.openlibrary.org/b/id/$bookCover-L.jpg" : '',
    //             ]
    //         );

    //     //Get each of the book's authors from the Open Library API.
    //     $olAuthors = $olBookResults['authors'];
    //     $authorIds = [];
    //     foreach($olAuthors as $author){
    //         $olAuthorId = $author['author']['key'];
    //         $olAuthorResults = $this->CallAPI(
    //             "GET",
    //             "https://openlibrary.org" . $olAuthorId . ".json"
    //         );

    //         //Add each author to the database.
    //         $dbAuthor = Author::updateOrCreate(
    //             ['open_lib_id' => $olAuthorId,],
    //             [
    //                 'name' => $olAuthorResults['name'], 
    //             ]
    //         );
    //         var_dump($dbBook);
    //         array_push($authorIds, $dbAuthor->id);
    //     }

    //     //Sync the many-to-many relationship between the book and its authors.
    //     $dbBook->authors()->sync($authorIds);
       
    //     return view("home");
    // }
}

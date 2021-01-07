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

    public function search(Request $request)
    {
        $query = $request->query("q");

        $results = $this->CallAPI(
            "GET",
            "http://openlibrary.org/search.json?q=" .
                str_replace(" ", "+", $query)
        );

        $pageData = [
            "results" => $results,
            "query" => $query,
        ];
        // var_dump($pageData);
        return view("search")->with($pageData);
    }


    public function author($id)
    {
        $dbAuthor = Author::find($id);
        //TODO: get the book and its authors from the OpenLibrary API if we don't have it.

        $pageData = [
            "author" => $dbAuthor,
            "books" => $dbAuthor->books
        ];

        // var_dump($pageData);
        return view("author")->with($pageData);
    }

    public function book($id)
    {
        $dbBook = Book::where("open_lib_id", "=", $id)->first();
        //TODO: get the book and its authors from the OpenLibrary API if we don't have it.

        $pageData = [
            "book" => $dbBook,
            "authors" => $dbBook->authors
        ];

        // var_dump($pageData);
        return view("book")->with($pageData);
    }

    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result, true);
    }
    public function add($id) {

        //Get the book from the Open Library API.
        $olBookResults = $this->CallAPI(
            "GET",
            "https://openlibrary.org/works/" . $id . ".json"
        );

        //Add the book to the database
        $dbBook = Book::updateOrCreate(
                ['open_lib_id' => $id,],
                [
                    'title' => $olBookResults['title'], 
                    'description' => "Sample description",
                    "image_url" => "https://covers.openlibrary.org/b/id/8054253-L.jpg",
                ]
            );

        //Get each of the book's authors from the Open Library API.
        $olAuthors = $olBookResults['authors'];
        $authorIds = [];
        foreach($olAuthors as $author){
            $olAuthorId = $author['author']['key'];
            $olAuthorResults = $this->CallAPI(
                "GET",
                "https://openlibrary.org" . $olAuthorId . ".json"
            );

            //Add each author to the database.
            $dbAuthor = Author::updateOrCreate(
                ['open_lib_id' => $olAuthorId,],
                [
                    'name' => $olAuthorResults['name'], 
                ]
            );
            var_dump($dbBook);
            array_push($authorIds, $dbAuthor->id);
        }

        //Sync the many-to-many relationship between the book and its authors.
        $dbBook->authors()->sync($authorIds);
       
        return view("home");
    }
}

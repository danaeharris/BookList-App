<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class Utilities
{
    public static function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result, true);
    }

    public static function getBook($id){
        //Try to get the book from our database.
        $dbBook = Book::where("open_lib_id", "=", $id)->first();

        //If we don't have it, sync it to our db  from OpenLibrary.
        if (!$dbBook || !$dbBook->authors) {
            $dbBook = Utilities::syncOpenLibBook($id);
        }
        return $dbBook;
    }

    public static function syncOpenLibBook($id) {

        //Get the book from the Open Library API.
        $olBookResults = Utilities::CallAPI(
            "GET",
            "https://openlibrary.org/works/" . $id . ".json"
        );

        //Add the book to the database
        $bookDescription = "Open Library does not have a description for this book.";

        if(array_key_exists("description", $olBookResults) && is_array($olBookResults["description"])) {
            $bookDescription = $olBookResults["description"]["value"];
        } else if(array_key_exists("description", $olBookResults)) {
            $bookDescription = $olBookResults["description"];
        }


        if(array_key_exists("covers", $olBookResults) && is_array($olBookResults["covers"])) {
            $bookCover = $olBookResults["covers"][0];
        } else {
            $bookCover = '';
        }

        $dbBook = Book::updateOrCreate(
                ['open_lib_id' => $id,],
                [
                    'title' => $olBookResults['title'], 
                    'description' => $bookDescription,
                    "image_url" => $bookCover ? "https://covers.openlibrary.org/b/id/$bookCover-L.jpg" : '',
                ]
            );

        //Get each of the book's authors from the Open Library API.
        $olAuthors = $olBookResults['authors'];
        $authorIds = [];
        foreach($olAuthors as $author){
            $olAuthorId = $author['author']['key'];
            $olAuthorResults = Utilities::CallAPI(
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
            // var_dump($dbBook);
            array_push($authorIds, $dbAuthor->id);
        }

        //Sync the many-to-many relationship between the book and its authors.
        $dbBook->authors()->sync($authorIds);

        return $dbBook;
       
        // return view("book")->with($dbBook);
    }

}
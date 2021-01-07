<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Utilities;
use App\Http\Controllers\Controller;


class SearchController  extends Controller
{
   public function search(Request $request)
    {
        $query = $request->query("q");

        $results = Utilities::CallAPI(
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
}
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


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

    public function book($id)
    {
        $results = $this->CallAPI(
            "GET",
            "https://openlibrary.org/works/" . $id . ".json"
        );

        $pageData = [
            "book" => $results,
        ];
        var_dump($pageData);
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
}

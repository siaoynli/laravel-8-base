<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get("query","");

        $results = [];
        if ($query) {
            $results = Article::search($query)->paginate(5);
        }
        return view("search", compact('results'));
    }
}

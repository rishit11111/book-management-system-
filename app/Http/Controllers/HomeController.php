<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $books = DB::table('books')->get();

        return view('home', ['books' => $books]);
    }

    public function searchBook(Request $req)
    {
        echo '<script>console.log("abc");</script>';
        $searchTerm = $req->input('search_book');

        $books = DB::table('books')
            ->where('Book_Title', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('home', ['books' => $books]);
    }

}

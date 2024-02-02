<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MangeBooks extends Controller
{
    function index(){
        $books = DB::table('books')->get();

        return view('manage', ['books' => $books]);
    }

    public function addBook(Request $req)
    {
        $book_title = $req->input('book_title');
        $ISBN = intval($req->input('ISBN'));
        $author = $req->input('author');
        $publisher = $req->input('publisher');
        $edition = $req->input('edition');
        $category = $req->input('category');
        $rack = intval($req->input('rack'));
        $copies = intval($req->input('copies'));
        $price = intval($req->input('price'));

        $add = DB::table('books')->insert([
            'Book_Title' => $book_title,
            'ISBN_No' => $ISBN,
            'Author' => $author,
            'Publisher' => $publisher,
            'Edition' => $edition,
            'Category' => $category,
            'Rack' => $rack,
            'Copies' => $copies,
            'Price' => $price
        ]);

        if($add == 1) {
            return redirect()->route('manage')->with('success', 'Book added successfully');
        } else {
            return redirect()->route('manage')->with('Error', 'Error while adding a book');
        }
    }

    public function editBook(Request $req){
        $book_title = $req->input('edit_book_title');
        $ISBN = (int)($req->input('edit_ISBN'));
        $author = $req->input('edit_author');
        $publisher = $req->input('edit_publisher');
        $edition = $req->input('edit_edition');
        $category = $req->input('edit_category');
        $rack = intval($req->input('edit_rack'));
        $copies = intval($req->input('edit_copies'));
        $price = intval($req->input('edit_price'));

        $res = DB::table('books')->where('ISBN_No', $ISBN)->update([
            'Book_Title' => $book_title,
            'Author' => $author,
            'Publisher' => $publisher,
            'Edition' => $edition,
            'Category' => $category,
            'Rack' => $rack,
            'Copies' => $copies,
            'Price' => $price
        ]);

        if($res == 1) {
            return redirect()->route('manage')->with('success', 'Book added successfully');
        } else {
            return redirect()->route('manage')->with('Error', 'Error while editing a book');
        }
    }

    public function deleteBook(Request $req){
        $ISBN = (int)($req->input('delete_ISBN'));
        $res = DB::table('books')->where('ISBN_No', $ISBN)->delete();

        if($res == 1) {
            return redirect()->route('manage')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('manage')->with('Error', 'Error while deleting a book');
        }
    }
}

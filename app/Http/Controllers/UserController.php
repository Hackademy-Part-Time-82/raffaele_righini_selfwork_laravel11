<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    $id_utente_autenticato= auth()->user()->id;

    $books = Book::where('user_id', '=', $id_utente_autenticato)->get();
        return view('profile.index', ['books'=> $books]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Mail\BookMail;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function index(){

        $books = Book::all();
        return view('index', ['books'=> $books]);
        
    }

    public function show(Book $book){

        return view('show', compact('book'));

    }

    public function create(){

        $authors= Author::all();
        return view('create', ['authors'=>$authors]);
       
    }

    public function store(BookStoreRequest $request){

        $path_image= '';
        if($request->hasFile('image')){
            //salvi
            $path_name= $request->file('image')->getClientOriginalName();
            $path_image= $request->file('image')->storeAs('covers', $path_name, 'public');
        }
        // else{ else non è più necessario perchè ho messo l'immagine di default a riga 37 prima ancora di entrare nell'if
        //     //fai altro
        //     $path_image= 'img_progetto_biblioteca\default.png';
        // }
        $book =Book::create([
            'name'=> $request->input('name'),
            'pages'=> $request->input('pages'),
            'year'=> $request->input('year'),
            'image'=> $path_image,
            'user_id'=> auth()->user()->id,
            'author_id'=> $request->input('author_id'),
            // 'user_id'=> Auth::user()->id,
            ]);

            Mail::to('admin@rrlibrary.it')->send(new BookMail($book));
            return redirect()->route('books.index')->with('success', 'Libro aggiunto correttamente');

    }

    public function edit(Book $book){

        $authors= Author::all();
    
        if (auth()->user()->id ==$book->user_id){

            return view('edit', ['book'=> $book], ['authors'=>$authors]);
        }
        abort(401);
        
    }

    public function update(BookStoreRequest $request, Book $book){

        if (auth()->user()->id ==$book->user_id){

            $path_image= $book->image;
            if($request->hasFile('image')){
                //salvi
                $path_name= $request->file('image')->getClientOriginalName();
                $path_image= $request->file('image')->storeAs('covers', $path_name, 'public');
            }
                // else{ else non è più necessario perchè ho messo l'immagine di default a riga 37 prima ancora di entrare nell'if
                //     //fai altro
                //     $path_image= 'img_progetto_biblioteca\default.png';
                // }
            $book->update([
                'name'=> $request->input('name'),
                'pages'=> $request->input('pages'),
                'year'=> $request->input('year'),
                'image'=> $path_image,
                'user_id'=> auth()->user()->id,
                // 'user_id'=> Auth::user()->id,
                'author_id'=> $request->input('author_id'),
            ]);
            
            return redirect()->route('books.index')->with('success', 'Libro modificato correttamente');
        }
        abort(401);
    }

    public function destroy(Book $book){

        if (auth()->user()->id ==$book->user_id){
            
            $book-> delete();
            return redirect()->route('books.index')->with('success', 'Libro eliminato correttamente');
        }
        abort(401);

    }
}


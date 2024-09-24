<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Método para armazenar um comentário
    public function store(Request $request, $bookId)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->book_id = $bookId;
        $comment->comment = $validatedData['comment'];
        $comment->save();

        return redirect()->route('books.show', $bookId)->with('success', 'Comentário adicionado com sucesso!');
    }

    // Método para visualizar os comentários de um livro
    public function show($bookId)
    {
        $book = Book::with('comments.user')->findOrFail($bookId);
        return view('books.show', compact('book'));
    }
}

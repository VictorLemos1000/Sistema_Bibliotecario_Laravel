@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p>Autor: {{ $book->author->name }}</p>
    <p>Editora: {{ $book->publisher->name }}</p>
    <p>Categorias:
        @foreach ($book->categories as $category)
            <span class="badge bg-secondary">{{ $category->name }}</span>
        @endforeach
    </p>

    <h2>Comentários</h2>
    @if ($book->comments->isEmpty())
        <p>Não há comentários para este livro ainda.</p>
    @else
        @foreach ($book->comments as $comment)
            <div class="border p-2 mb-2">
                <strong>{{ $comment->user->name }}</strong>:
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    @endif

    @auth
    <h3>Adicionar um Comentário</h3>
    <form action="{{ route('comments.store', $book->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Seu Comentário:</label>
            <textarea name="comment" id="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Adicionar Comentário</button>
    </form>
    @else
    <p>Você precisa estar logado para comentar.</p>
    @endauth
</div>
@endsection

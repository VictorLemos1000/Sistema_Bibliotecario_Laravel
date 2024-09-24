<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = ['title', 'author_id', 'publisher_id', 'published_year'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function categories()
    {
        return $this->belongsToMany(CategorySeeder::class);
    }

}

    foreach ($categories as $category) {
        echo $category->name . " possui " . $category->books_count . " livros.\n";
    }

    $books = Book::with('author')->get();

    foreach ($books as $book) {
        echo $book->author->name . "\n";
    }

    $books = Book::with(['author', 'publisher'])->get();

    foreach ($books as $book) {
        echo $book->title . " escrito por " . $book->author->name . ", publicado por " . $book->publisher->name . "\n";
    }

    $books = Book::with(['author' => function($query) {
        $query->where('birth_date', '>', '1900-01-01');
    }])->get();

    foreach ($books as $book) {
        echo $book->title . " escrito por " . $book->author->name . " (nascido após 1900)\n";
    }

    $books = Book::with('author')->paginate(10);

    foreach ($books as $book) {
        echo $book->title . " escrito por " . $book->author->name . "\n";
    }

    echo $book->links();

    $book = Book::find(1);

    $book->categories()->attach([1, 2]);

    $categories = $book->categories()->get();
    foreach ($categories as $category) {
        echo $category->name . "\n";
    }

    $book = Book::find(1);

    $book->categories()->detach(2);

    $categories = $book->categories()->get();
    foreach ($categories as $category) {
        echo $category->name . "\n";
    }

    $book = Book::find(1);

    $book->categories()->sync([1, 3]);

    $categories = $book->categories()->get();
    foreach ($categories as $category) {
        echo $category->name . "\n";
    }

    $book = Book::find(1);
    $book->categories()->attach([1, 2]);

    $categories = $book->categories()->get();
    foreach ($categories as $category) {
        echo $category->name . "\n";
    }




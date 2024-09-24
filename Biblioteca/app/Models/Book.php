<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'category_id', 'published_year'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(CategorySeeder::class);
    }


}
    $books = Book::where('published_year', '>', 1950)->orderBy('title', 'asc')-> take(5)->get();

    foreach ($books as $book) {
        echo $book->title . " (" . $book->published_year . ")\n";
    }

    $averageYear = Book::avg('published_year');
    $totalBooks = Book::count();
    $earliestPublication = Book::min('published_year');
    $latestPublication = Book::max('published_year');

    echo "Ano médio de publicação: " . $averageYear . "\n";
    echo "Total de livros: " . $totalBooks . "\n";
    echo "Ano da primeira publicação: " . $earliestPublication . "\n";
    echo "Ano da última publicação: " . $latestPublication . "\n";

    $books = Book::all(); // Uma consulta para buscar todos os livros

    foreach ($books as $book) {
        echo $book->author->name . "\n";
    }


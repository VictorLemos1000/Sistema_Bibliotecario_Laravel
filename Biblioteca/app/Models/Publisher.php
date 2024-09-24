<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publisher extends Model
{

    protected $fillable = ['name', 'address'];


    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
    $books = $publisher->books()->get();

    foreach ($books as $book) {
        echo $book->title . " (" . $book->published_year . ")\n";
    }

    $publishers = Publisher::withCount('books')->get();

    foreach ($publishers as $publisher) {
        echo $publisher->name . " possui " . $publisher->books_count . " livros.\n";
    }

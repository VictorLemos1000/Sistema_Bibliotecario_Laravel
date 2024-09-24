<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Romance',
            'Fantasia',
            'Ficção Científica',
            'Ficção Brasileira',
            'Clássico',
            'Suspense'
        ];

        foreach ($categories as $category) {
            // Verifica se a categoria já existe antes de criar
            $category::firstOrCreate(['name' => $category]);
        }
    }
}

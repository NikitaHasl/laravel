<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categoryList' => $this->newsCategories
        ]);
    }

    public function show(int $id)
    {
        return view('categories.show', [
            'newsList' => $this->getNews(),
            'category' => $this->newsCategories[$id],
        ]);
    }
}

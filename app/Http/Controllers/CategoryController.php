<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'title'])
            ->get();
        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }
}

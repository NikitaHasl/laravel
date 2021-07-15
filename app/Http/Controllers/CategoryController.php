<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getCategories();
        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }
}

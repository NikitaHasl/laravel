<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsModel = new News();
        $news = $newsModel->getNews();
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $newsModel = new News();
        $newsById = $newsModel->getNewsById($id);
        return view('news.show', [
            'news' => $newsById[0]
        ]);
    }

    public function newsByCategory(int $categoryId)
    {
        $newsModel = new News();
        $newsByCategory = $newsModel->getNewsByCategory($categoryId);
        return view('news.newsByCategory', [
            'newsList' => $newsByCategory
        ]);
    }
}

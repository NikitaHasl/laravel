<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['user', 'category'])
            ->paginate(5);
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }

    public function newsByCategory(int $categoryId)
    {
        $newsByCategory = News::with(['user', 'category'])
            ->where('category_id', '=', $categoryId)
            ->paginate(5);
        return view('news.newsByCategory', [
            'newsList' => $newsByCategory
        ]);
    }
}

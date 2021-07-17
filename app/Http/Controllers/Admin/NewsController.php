<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $news = News::join('users', 'news.user_id', '=', 'users.id')
        //     ->join('categories', 'news.category_id', '=', 'categories.id')
        //     ->select(['news.id as id', 'categories.title as category', 'users.firstname as username', 'news.title as title', 'news.slug as slug', 'news.status as status', 'news.description as description', 'news.created_at as created_at'])
        //     ->orderBy('id')
        //     ->get();
        $news = News::with(['category', 'user'])
            ->select(['id', 'category_id', 'user_id', 'title', 'slug', 'status', 'description', 'created_at'])
            ->orderBy('id')
            ->get();
        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select(['id', 'firstname'])->get();
        $categories = Category::select(['id', 'title'])->get();
        return view('admin.news.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);
        $data = $request->only(['title', 'user_id', 'category_id', 'status', 'description']);
        $data['slug'] = Str::slug($data['title']);
        $news = News::create($data);

        if ($news) {
            return redirect()->route('admin.news.index')->with('success', 'Запись добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->only(['title', 'user_id', 'category_id', 'status', 'description']);
        $data['slug'] = Str::slug($data['title']);
        $statusNews = $news->fill($data)->save();

        if ($statusNews) {
            return redirect()->route('admin.news.index')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

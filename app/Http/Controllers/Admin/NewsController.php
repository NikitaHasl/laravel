<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;
use App\Http\Requests\NewsUpdate;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Exception;
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
    public function store(NewsStore $request)
    {
        $data = $request->validate();
        $data['slug'] = Str::slug($data['title']);
        $news = News::create($data);

        if ($news) {
            return redirect()->route('admin.news.index')->with('success', trans('message.admin.news.created.success'));
        }

        return back()->with('error', trans('message.admin.news.created.fail'));
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
    public function update(NewsUpdate $request, News $news)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $statusNews = $news->fill($data)->save();

        if ($statusNews) {
            return redirect()->route('admin.news.index')->with('success', trans('message.admin.news.updated.success'));
        }

        return back()->with('error', trans('message.admin.news.updated.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {
            try {
                $news->delete();
            } catch (Exception $e) {
                report($e);
            }
        }
    }
}

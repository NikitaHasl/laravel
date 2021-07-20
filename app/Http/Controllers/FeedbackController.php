<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStore;
use App\Models\News;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function store(FeedbackStore $request)
    {
        dd($request->validated());
    }
}

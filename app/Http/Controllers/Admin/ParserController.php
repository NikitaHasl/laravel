<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ParserContract;
use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserContract $service)
    {
        dd($service->getParsedList('https://news.yandex.ru/army.rss'));
    }
}

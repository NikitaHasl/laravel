<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ParserContract;
use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\Resource;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserContract $service)
    {
        $resources = Resource::all();
        foreach ($resources as $res) {
            dispatch(new NewsJob($res->url));
        }

        return "Данные скачаны";
    }
}

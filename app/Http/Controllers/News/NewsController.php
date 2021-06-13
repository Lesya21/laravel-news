<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => News::all()->sortByDesc('id')
        ]);
    }

    public function detail(News $news)
    {
        return view('news.detail', [
            'news' => $news
        ]);
    }

    public function contacts()
    {
        return view('contacts');
    }
}

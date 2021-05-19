<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => $this->newsList
        ]);
    }

    public function detail(int $id)
    {
        return view('news.detail', [
            'id' => $id
        ]);
    }
}

<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $model = new News();
        $newsList = $model->newsList();
        return view('news.index', [
            'newsList' => $newsList
        ]);
    }

    public function detail(int $id)
    {
        $model = new News();
        $news = $model->news($id);
        return view('news.detail', [
            'news' => $news
        ]);
    }

    public function contacts()
    {
        return view('contacts');
    }
}

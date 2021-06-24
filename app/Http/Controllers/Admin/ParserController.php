<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    const URL  = 'https://news.yandex.ru/music.rss';

    public function index(ParserService $service)
    {
        $serviceNews = $service->getNews(self::URL);

        foreach ($serviceNews['news'] as $item) {
            $news = News::create([
                'title' => mb_strimwidth($item['title'], 0, 51, "..."),
                'code' => $item['link'],
                'description' => $item['description']
            ]);
            $categories = Category::find([1]);
            $news->categories()->attach($categories);
        }

        return redirect()->route('news.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    const URLS  = [
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/auto_racing.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/gadgets.rss',
        'https://news.yandex.ru/index.rss',
        'https://news.yandex.ru/martial_arts.rss',
        'https://news.yandex.ru/communal.rss',
        'https://news.yandex.ru/health.rss',
        'https://news.yandex.ru/games.rss',
        'https://news.yandex.ru/internet.rss',
        'https://news.yandex.ru/cyber_sport.rss',
        'https://news.yandex.ru/movies.rss',
        'https://news.yandex.ru/cosmos.rss',
        'https://news.yandex.ru/culture.rss',
        'https://news.yandex.ru/fire.rss',
        'https://news.yandex.ru/championsleague.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/nhl.rss'
    ];

    public function index()
    {
        foreach (self::URLS as $url) {
            NewsJob::dispatch($url);
        }

        return redirect()->route('news.index');
    }
}

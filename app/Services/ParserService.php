<?php declare(strict_types=1);


namespace App\Services;

use App\Contracts\ParserServiceContract;

use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserServiceContract
{
    public function getNews($url): array
    {
        $xml = XmlParser::load($url);
        $serviceNews = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'code' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        foreach ($serviceNews['news'] as $item) {
            $news = News::create([
                'title' => mb_strimwidth($item['title'], 0, 51, "..."),
                'code' => $item['link'],
                'description' => $item['description']
            ]);
            $categories = Category::find([1]);
            $news->categories()->attach($categories);
        }
    }
}

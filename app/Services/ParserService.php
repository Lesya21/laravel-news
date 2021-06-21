<?php declare(strict_types=1);


namespace App\Services;

use App\Contracts\ParserServiceContract;

use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserServiceContract
{
    public function getNews(string $url): array
    {
        $xml = XmlParser::load($url);
        return $xml->parse([
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
    }
}

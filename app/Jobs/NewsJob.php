<?php

namespace App\Jobs;

use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;

    /**
     * NewsJob constructor.
     * @param ParserService $service
     * @param $parserList
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function handle(ParserService $service)
    {
        $service->getNews($this->url);
    }
}

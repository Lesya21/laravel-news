<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news()
    {
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function test_news_detail()
    {
        $response = $this->get(route('news.detail', ['id' => 2]));

        $response->assertStatus(200);
    }
}

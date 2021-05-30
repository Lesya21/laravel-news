<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_header_form()
    {
        $response = $this->json('POST', route('forms.callback'), ['name' => 'Sally', 'comment'=> 'Some text']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_order_form()
    {
        $response = $this->json('POST', route('forms.data'), [
            'name' => 'Sally',
            'phone' => '89109999999',
            'email' => 'test@test.ru',
            'comment'=> 'Some text'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;

class ArticleApiUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_can_create_an_article() 
    {
        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];

        $this->post(route('articles.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}

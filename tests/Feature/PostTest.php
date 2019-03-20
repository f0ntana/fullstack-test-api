<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class PostTest extends TestCase
{
    /**
     * Variable to set array test.
     *
     * @var array
     */
    protected $data = [
        'title' => 'title',
        'author' => 'author',
        'image_url' => 'image_url',
        'post' => 'post',
    ];

    /**
     * Test Posts SetUp
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:refresh --seed --env=testing');
    }

    /**
     * Test Check Posts Status Code.
     *
     * @return void
     */
    public function testPostsStore()
    {
        $response = $this->json('POST', '/api/posts', $this->data);

        $response
            ->assertStatus(201)
            ->assertJson($this->data);
    }

    /**
     * Test Check Posts Status Code.
     *
     * @return void
     */
    public function testPostsResponse(): void
    {
        $this->json('POST', '/api/posts', $this->data);
        $response = $this->json('GET', '/api/posts');

        $response
            ->assertStatus(200)
            ->assertJson([
                $this->data
            ]);
    }
}

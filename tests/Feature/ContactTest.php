<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ContactTest extends TestCase
{
    /**
     * Variable array test.
     *
     * @var array
     */
    protected $data = [
        'name' => 'name',
        'email' => 'email@email.com',
        'phone' => '9999999999',
        'message' => 'message',
    ];

    /**
     * Variable wrong array test.
     *
     * @var array
     */
    protected $wrongData = [
        'name' => 'name',
        'email' => 'email',
        'phone' => '9999999999',
        'message' => 'message',
    ];

    /**
     * Test Contacts SetUp
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:refresh --seed --env=testing');
    }

    /**
     * Test Check Contacts Status Code.
     *
     * @return void
     */
    public function testContactsStore()
    {
        $response = $this->json('POST', '/api/contacts', $this->data);

        $response
            ->assertStatus(201)
            ->assertJson($this->data);
    }

    /**
     * Test Check Contacts Status Code.
     *
     * @return void
     */
    public function testContactsResponse(): void
    {
        $this->json('POST', '/api/contacts', $this->data);
        $response = $this->json('GET', '/api/contacts');

        $response
            ->assertStatus(200)
            ->assertJson([
                $this->data
            ]);
    }

    /**
     * Test Check Contacts Status Code.
     *
     * @return void
     */
    public function testContactsValidate(): void
    {
        $response = $this->json('POST', '/api/contacts', $this->wrongData);

        $response
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => [
                        "The email must be a valid email address."
                    ]
                ]
            ]);
    }
}

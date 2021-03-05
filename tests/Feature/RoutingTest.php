<?php

namespace Tests\Feature;

use App\Models\Signature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * GET home
     * Reach the home page with success
     *
     * @return void
     */
    public function testGetHome(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * GET signatures
     * Reach the signatures page with success
     *
     * @return void
     */
    public function testGetSignatures(): void
    {
        $response = $this->get('/signatures');

        $response->assertStatus(200);
    }

    /**
     * POST sign
     * Submit a healthy signing form
     *
     * @return void
     */
    public function testPostSign1(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('signatures', 1);
    }

    /**
     * POST sign
     * Submit an incorrect signing form
     *
     * @return void
     */
    public function testPostSign2(): void
    {
        $response = $this->post('/', [
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('signatures', 0);
    }
}

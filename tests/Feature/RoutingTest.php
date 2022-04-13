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

        $response->assertOk();
    }

    /**
     * GET signatures
     * Reach the signature page with success
     * There is no signatures
     *
     * @return void
     */
    public function testGetSignatures1(): void
    {
        $response = $this->get('/signatures');

        $response->assertOk();
    }

    /**
     * GET signatures
     * Reach the signature page with success
     * There is one page of signatures
     *
     * @return void
     */
    public function testGetSignatures2(): void
    {
        Signature::factory()->confirmed()->count(10);
        $response = $this->get('/signatures');

        $response->assertOk();
    }

    /**
     * GET signatures?page=1
     * Reach the signatures' first page with success
     * There are two pages of signatures
     *
     * @return void
     */
    public function testGetSignatures3(): void
    {
        Signature::factory()->confirmed()->count(20);
        $response = $this->get('/signatures');

        $response->assertOk();
    }

    /**
     * GET signatures?page=2
     * Reach the signatures' second page with success
     * There are two pages of signatures
     *
     * @return void
     */
    public function testGetSignatures4(): void
    {
        Signature::factory()->confirmed()->count(20);
        $response = $this->get('/signatures?page=2');

        $response->assertOk();
    }

    /**
     * GET signatures?page=3
     * Reach the signatures' third page with success
     * There are two pages of signatures
     *
     * @return void
     */
    public function testGetSignatures5(): void
    {
        Signature::factory()->confirmed()->count(20);
        $response = $this->get('/signatures?page=3');

        $response->assertOk();
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

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'register',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);
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

        $response->assertValid([
            'last_name',
            'email',
            'register',
        ]);
        $response->assertInvalid([
            'first_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }
}

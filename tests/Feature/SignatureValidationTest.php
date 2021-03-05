<?php

namespace Tests\Feature;

use App\Models\Signature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignatureValidationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Submit a filled signing form
     *
     * @return void
     */
    public function testSign(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);
    }

    /**
     * First name is missing
     *
     * @return void
     */
    public function testSignMissing1(): void
    {
        $this->post('/', [
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Last name is missing
     *
     * @return void
     */
    public function testSignMissing2(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is missing
     *
     * @return void
     */
    public function testSignMissing3(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is missing
     *
     * @return void
     */
    public function testSignMissing4(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * First name is empty
     *
     * @return void
     */
    public function testSignEmpty1(): void
    {
        $this->post('/', [
            'first_name' => '',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Last name is empty
     *
     * @return void
     */
    public function testSignEmpty2(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => '',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is empty
     *
     * @return void
     */
    public function testSignEmpty3(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => '',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is not checked
     *
     * @return void
     */
    public function testSignEmpty4(): void
    {
        $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => '',
        ]);

        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email already used
     *
     * @return void
     */
    public function testEmailNotUnique(): void
    {
        $signature = new Signature();
        $signature->first_name = 'Foo';
        $signature->last_name = 'Bar';
        $signature->email = 'foo@bar.tld';
        $signature->save();

        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);

        $this->post('/', [
            'first_name' => 'Bar',
            'last_name' => 'Foo',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Bar',
            'last_name' => 'Foo',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);
    }
}

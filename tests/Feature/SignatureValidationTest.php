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

    /**
     * Last name is missing
     *
     * @return void
     */
    public function testSignMissing2(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'register',
        ]);
        $response->assertInvalid([
            'last_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is missing
     *
     * @return void
     */
    public function testSignMissing3(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is missing
     *
     * @return void
     */
    public function testSignMissing4(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
        ]);
        $response->assertInvalid([
            'register',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * First name is empty
     *
     * @return void
     */
    public function testSignEmpty1(): void
    {
        $response = $this->post('/', [
            'first_name' => '',
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

    /**
     * Last name is empty
     *
     * @return void
     */
    public function testSignEmpty2(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => '',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'register',
        ]);
        $response->assertInvalid([
            'last_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is empty
     *
     * @return void
     */
    public function testSignEmpty3(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => '',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is not checked
     *
     * @return void
     */
    public function testSignEmpty4(): void
    {
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => '',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
        ]);
        $response->assertInvalid([
            'register',
        ]);
        $response->assertRedirect('/');
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
        $signature->first_name = 'Bar';
        $signature->last_name = 'Foo';
        $signature->email = 'foo@bar.tld';
        $signature->save();

        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);

        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Foo',
            'email' => 'foo@bar.tld',
        ]);
    }
}

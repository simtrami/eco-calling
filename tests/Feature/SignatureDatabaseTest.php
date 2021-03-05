<?php

namespace Tests\Feature;

use App\Models\Signature;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SignatureDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create and save a signature.
     *
     * @return void
     */
    public function testCreateSignature1(): void
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
    }

    /**
     * Create and save a signature with a non-fillable field.
     *
     * @return void
     */
    public function testCreateSignature2(): void
    {
        $email_verified_at = Carbon::now();

        $signature = new Signature();
        $signature->first_name = 'Foo';
        $signature->last_name = 'Bar';
        $signature->email = 'foo@bar.tld';
        $signature->email_verified_at = $email_verified_at;
        $signature->save();

        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => $email_verified_at,
        ]);
    }

    /**
     * Create and save a signature using mass assignment.
     *
     * @return void
     */
    public function testMassAssignSignature1(): void
    {
        Signature::create([
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);

        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);
    }

    /**
     * Create and save a signature using mass assignment with a non-fillable field.
     *
     * @return void
     */
    public function testMassAssignSignature2(): void
    {
        $email_verified_at = Carbon::now();

        Signature::create([
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => $email_verified_at,
        ]);

        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => $email_verified_at,
        ]);
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'email_verified_at' => null,
        ]);
    }

    /**
     * Update a signature.
     *
     * @return void
     */
    public function testUpdateSignature1(): void
    {
        Signature::factory()->create();

        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Fork',
        ]);

        $signature = Signature::latest()->first();
        $signature->first_name = 'Fork';
        $signature->save();

        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Fork',
        ]);
    }

    /**
     * Update a non-fillable field of a signature.
     *
     * @return void
     */
    public function testUpdateSignature2(): void
    {
        Signature::factory()->create();
        $email_verified_at = Carbon::now();

        $this->assertDatabaseMissing('signatures', [
            'email_verified_at' => $email_verified_at,
        ]);

        $signature = Signature::latest()->first();
        $signature->email_verified_at = $email_verified_at;
        $signature->save();

        $this->assertDatabaseHas('signatures', [
            'email_verified_at' => $email_verified_at,
        ]);
    }

    /**
     * Update a signature with a mass assignment.
     *
     * @return void
     */
    public function testMassUpdateSignature1(): void
    {
        Signature::factory()->create();

        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Fork',
        ]);

        $signature = Signature::latest()->first();
        $signature->update(['first_name' => 'Fork']);

        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Fork',
        ]);
    }

    /**
     * Update a non-fillable field of a signature with a mass assignment.
     *
     * @return void
     */
    public function testMassUpdateSignature2(): void
    {
        Signature::factory()->create();
        $email_verified_at = Carbon::now();

        $this->assertDatabaseMissing('signatures', [
            'email_verified_at' => $email_verified_at,
        ]);

        $signature = Signature::latest()->first();
        $signature->update(['email_verified_at' => $email_verified_at]);

        $this->assertDatabaseMissing('signatures', [
            'email_verified_at' => $email_verified_at,
        ]);
    }

    /**
     * Collect all the confirmed signatures.
     *
     * @return void
     */
    public function testCollectConfirmedSignatures(): void
    {
        Signature::factory()->count(20)
            ->sequence(
                ['email_verified_at' => Carbon::now()],
                ['email_verified_at' => null],
            )
            ->create();

        $this->assertDatabaseCount('signatures', 20);

        $confirmedSignatures = Signature::confirmed()->get();
        self::assertEquals(10, $confirmedSignatures->count());
    }

    /**
     * Collect all the pending signatures.
     *
     * @return void
     */
    public function testCollectPendingSignatures(): void
    {
        Signature::factory()->count(20)
            ->sequence(
                ['email_verified_at' => Carbon::now()],
                ['email_verified_at' => null],
            )
            ->create();

        $this->assertDatabaseCount('signatures', 20);

        $pendingSignatures = Signature::pending()->get();
        self::assertEquals(10, $pendingSignatures->count());
    }

    /**
     * Delete a signature.
     *
     * @return void
     * @throws Exception
     */
    public function testDeleteSignature(): void
    {
        Signature::factory()->create();

        $this->assertDatabaseCount('signatures', 1);

        $signature = Signature::latest()->first();
        $signature->delete();

        $this->assertDatabaseCount('signatures', 0);
    }
}

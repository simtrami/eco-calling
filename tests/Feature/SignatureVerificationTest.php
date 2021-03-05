<?php

namespace Tests\Feature;

use App\Events\Signed;
use App\Models\Signature;
use App\Notifications\VerifySignature;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SignatureVerificationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Send a VerifySignature notification when a Signed event is dispatched.
     *
     * @return void
     * @throws Exception
     */
    public function testNotification(): void
    {
        Notification::fake();

        Notification::assertNothingSent();

        $signature = Signature::factory()->create();

        event(new Signed($signature));

        Notification::assertSentTo($signature, function (VerifySignature $notification) use ($signature) {
            return $signature->id === $notification->signature->id;
        });
        Notification::assertSentToTimes($signature, VerifySignature::class, 1);
    }
}

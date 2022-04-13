<?php

namespace App\Events;

use App\Models\Signature;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Signed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The new signature.
     *
     * @var Signature
     */
    public Signature $signature;

    /**
     * Create a new event instance.
     *
     * @param Signature $signature
     */
    public function __construct(Signature $signature)
    {
        $this->signature = $signature;
    }
}

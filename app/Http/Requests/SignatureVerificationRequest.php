<?php

namespace App\Http\Requests;

use App\Models\Signature;
use Illuminate\Foundation\Http\FormRequest;

class SignatureVerificationRequest extends FormRequest
{
    /**
     * @var Signature
     */
    private Signature $signature;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $signature = Signature::findOrFail($this->route('id'));

        $this->signature = $signature;

        if (!hash_equals((string)$this->route('hash'),
            sha1($this->signature->getEmailForVerification()))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill(): void
    {
        $this->signature->markEmailAsVerified();
    }
}

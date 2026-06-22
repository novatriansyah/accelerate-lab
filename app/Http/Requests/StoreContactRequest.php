<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:5000',
            'my_favorite_color' => 'nullable|string',
            'cf-turnstile-response' => [
                config('services.turnstile.secret_key') ? 'required' : 'nullable',
                function ($attribute, $value, $fail) {
                    $secret = config('services.turnstile.secret_key');
                    if (empty($secret)) {
                        return;
                    }

                    $response = \Illuminate\Support\Facades\Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                        'secret' => $secret,
                        'response' => $value,
                        'remoteip' => request()->ip(),
                    ]);

                    if (!$response->successful() || !$response->json('success')) {
                        $fail('The CAPTCHA verification failed. Please try again.');
                    }
                }
            ],
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
        ];
    }
}

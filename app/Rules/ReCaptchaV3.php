<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Rule;

class ReCaptchaV3 implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Send a POST request to the Google siteverify service to validate the reCAPTCHA token
        $siteVerify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha_v3.secretKey'),
            'response' => $value,
        ]);

        // Check if the request to Google's service failed
        if ($siteVerify->failed()) {
            return false;
        }

        // Google successfully processed our POST request. We still need to check the results.
        if ($siteVerify->successful()) {
            $body = $siteVerify->json();

            // Check if reCAPTCHA validation succeeded
            return $body['success'] === true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Google reCAPTCHA verification failed. Please try again.';
    }
}

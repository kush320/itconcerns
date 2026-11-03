# reCAPTCHA Implementation Guide

This guide explains how Google reCAPTCHA is implemented in this Laravel application.

## Overview

The application uses **Google reCAPTCHA v2** (checkbox version) to protect forms from spam and bots. There's also a `ReCaptchaV3` rule class available, but it's currently not being used in the validation.

## Current Implementation

### 1. Configuration

The reCAPTCHA configuration is stored in `config/services.php`:

```php
'recaptcha_v3' => [
    'siteKey' => env('RECAPTCHA_V3_SITE_KEY'),
    'secretKey' => env('RECAPTCHA_V3_SECRET_KEY'),
]
```

**Note:** There's an inconsistency - views use `GOOGLE_RECAPTCHA_KEY_CLIENT` but config uses `RECAPTCHA_V3_SITE_KEY`.

### 2. Environment Variables

Add these to your `.env` file:

```env
# For reCAPTCHA v2 (currently used)
GOOGLE_RECAPTCHA_KEY_CLIENT=your_site_key_here
GOOGLE_RECAPTCHA_SECRET_KEY=your_secret_key_here

# For reCAPTCHA v3 (configured but not fully used)
RECAPTCHA_V3_SITE_KEY=your_v3_site_key_here
RECAPTCHA_V3_SECRET_KEY=your_v3_secret_key_here
```

### 3. Frontend Implementation

reCAPTCHA is implemented in the following views:
- `resources/views/frontend/pages/contactus.blade.php`
- `resources/views/frontend/index.blade.php`
- `resources/views/frontend/service/details.blade.php`
- `resources/views/frontend/training/details.blade.php`
- `resources/views/frontend/career/details.blade.php`
- `resources/views/auth/login.blade.php`

#### HTML Implementation:

```blade
<div class="form-group mb-2">
    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
    @if ($errors->has('g-recaptcha-response'))
        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
    @endif
</div>
```

#### JavaScript Script Tag:

Add this before the closing `@endsection`:

```blade
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```

### 4. Backend Validation

Currently, the validation only checks if the `g-recaptcha-response` field is present, but **does not verify it with Google's API**.

#### Current Implementation (in `HomeController.php`):

```php
$request->validate([
    'name' => 'required|string',
    'email' => 'required|email',
    'phone' => 'required|int|digits:10',
    'message' => 'required|string',
    'g-recaptcha-response' => 'required', // Only checks if present, doesn't verify
]);
```

#### Forms Using reCAPTCHA:

1. **Contact Form** (`saveEnquiry` method)
2. **Request Quote Form** (`saveQuote` method)
3. **Training Form** (`saveTraining` method)

## Available: ReCaptchaV3 Rule Class

There's a `ReCaptchaV3` rule class at `app/Rules/ReCaptchaV3.php` that can properly validate reCAPTCHA tokens, but it's **not currently being used**.

### How to Use the ReCaptchaV3 Rule:

To properly validate reCAPTCHA, update your validation like this:

```php
use App\Rules\ReCaptchaV3;

$request->validate([
    'name' => 'required|string',
    'email' => 'required|email',
    'phone' => 'required|int|digits:10',
    'message' => 'required|string',
    'g-recaptcha-response' => ['required', new ReCaptchaV3()],
]);
```

## Setting Up Google reCAPTCHA

### Step 1: Get reCAPTCHA Keys

1. Go to [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
2. Click "Create" to register a new site
3. Choose reCAPTCHA v2 → "I'm not a robot" Checkbox
4. Add your domain(s)
5. Copy the **Site Key** and **Secret Key**

### Step 2: Add Keys to Environment

Add the keys to your `.env` file:

```env
GOOGLE_RECAPTCHA_KEY_CLIENT=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
GOOGLE_RECAPTCHA_SECRET_KEY=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
```

**Note:** The above are Google's test keys. Replace with your actual keys.

### Step 3: Verify Implementation

1. Clear config cache: `php artisan config:clear`
2. Test the form submission
3. Check that reCAPTCHA widget appears
4. Verify validation works

## Issues & Recommendations

### Current Issues:

1. **Incomplete Validation**: The backend only checks if `g-recaptcha-response` exists but doesn't verify it with Google's API
2. **Environment Variable Mismatch**: Views use `GOOGLE_RECAPTCHA_KEY_CLIENT` but config uses `RECAPTCHA_V3_SITE_KEY`
3. **Unused Rule Class**: `ReCaptchaV3` rule exists but isn't being used

### Recommendations:

1. **Use the ReCaptchaV3 Rule**: Update validation to use `new ReCaptchaV3()` for proper verification
2. **Standardize Environment Variables**: Use consistent naming across views and config
3. **Add Server-Side Verification**: Currently missing - implement it using the existing rule class

## Example: Proper Implementation

### Frontend (Blade Template):

```blade
<form method="POST" action="{{ route('contact.submit') }}">
    @csrf
    <!-- Your form fields -->
    
    <div class="form-group mb-2">
        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY_CLIENT') }}"></div>
        @error('g-recaptcha-response')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit">Submit</button>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```

### Backend (Controller):

```php
use App\Rules\ReCaptchaV3;

public function saveEnquiry(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|int|digits:10',
        'message' => 'required|string',
        'g-recaptcha-response' => ['required', new ReCaptchaV3()],
    ]);
    
    // Process form...
}
```

## Testing

### Test Keys (for development):

Google provides test keys that always pass:

- **Site Key**: `6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI`
- **Secret Key**: `6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe`

These keys work for all domains and always pass validation.

## Troubleshooting

### reCAPTCHA not showing:
- Check that `GOOGLE_RECAPTCHA_KEY_CLIENT` is set in `.env`
- Verify the script tag is included
- Check browser console for errors
- Ensure domain is registered in Google reCAPTCHA console

### Validation failing:
- Verify secret key is correct
- Check that `ReCaptchaV3` rule is being used
- Ensure form includes `g-recaptcha-response` field
- Check Laravel logs for errors

### Common Errors:
- **"Invalid site key"**: Wrong site key or domain not registered
- **"Missing input response"**: reCAPTCHA not completed by user
- **"Invalid input response"**: Token expired or invalid

## Additional Resources

- [Google reCAPTCHA Documentation](https://developers.google.com/recaptcha/docs/display)
- [Laravel Validation Documentation](https://laravel.com/docs/validation)



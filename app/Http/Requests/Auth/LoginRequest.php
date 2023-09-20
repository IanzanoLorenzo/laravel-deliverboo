<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Il campo email è obbligatorio',
            'email.string' => 'Il campo email deve essere una stringa',
            'email.email' => 'Inserisci un indirizzo email valido',
    
            'password.required' => 'Il campo password è obbligatorio',
            'password.string' => 'Il campo password deve essere una stringa',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');
        $remember = $this->boolean('remember');
    
        if (! Auth::attempt($credentials, $remember)) {
            // Controlla se l'email non esiste
            if (! User::where('email', $credentials['email'])->exists()) {
                throw ValidationException::withMessages([
                    'email' => 'L\'indirizzo email non esiste.',
                ]);
            }

            if (! User::where('email', $credentials['password'])->exists()) {
                throw ValidationException::withMessages([
                    'email' => 'La password non è corretta.',
                ]);
            }
    
            RateLimiter::hit($this->throttleKey());
    
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    
        RateLimiter::clear($this->throttleKey());    
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}

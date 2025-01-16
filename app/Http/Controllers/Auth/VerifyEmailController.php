<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectBasedOnRole($request->user()->role);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->redirectBasedOnRole($request->user()->role);
    }

    private function redirectBasedOnRole(string $role): RedirectResponse
    {
        $routes = [
            'trader' => 'trader.dashboard',
            'customer' => 'customer.dashboard',
            'employee' => 'employee.dashboard'
        ];

        return redirect()->intended(route($routes[$role], absolute: false).'?verified=1');
    }
}

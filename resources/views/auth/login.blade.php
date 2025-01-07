@extends('layouts.app')

@section('header-content')
    <div class="mx-20 absolute bottom-24">
        <h1 class="font-Inter text-white font-bold text-2xl">Login to Your Account</h1>
    </div>
@endsection

@section('content')
<div class="container mx-auto py-16">
    <div class="max-w-md mx-auto bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-100">
        <div class="text-center mb-8">
            <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-12 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
            <p class="text-gray-600">Please enter your credentials to continue</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold"/>
                <x-text-input id="email" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="Enter your email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold"/>
                <x-text-input id="password" 
                    class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-closeryellow focus:ring-closeryellow" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-closeryellow hover:text-closeryellow/80 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-closeryellow text-white py-3 rounded-lg font-semibold hover:bg-closeryellow/90 transition-colors">
                {{ __('Sign In') }}
            </button>

            <p class="text-center text-gray-600 text-sm">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-closeryellow hover:text-closeryellow/80 font-semibold">Sign up</a>
            </p>
        </form>
    </div>
</div>

@endsection

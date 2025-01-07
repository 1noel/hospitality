@extends('layouts.app')

@section('header-content')
    <div class="mx-20 absolute bottom-24">
        <h1 class="font-Inter text-white font-bold text-2xl">Create Your Account</h1>
    </div>
@endsection

@section('content')
    <div class="container mx-auto py-16">
        <div class="max-w-md mx-auto bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-100">
            <div class="text-center mb-8">
                <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-12 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Join Us Today!</h2>
                <p class="text-gray-600">Fill in your details to get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-2">
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-semibold"/>
                    <x-text-input id="name" 
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your full name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold"/>
                    <x-text-input id="email"
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="Enter your email address" />
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
                        autocomplete="new-password"
                        placeholder="Create a strong password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold"/>
                    <x-text-input id="password_confirmation"
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="w-full bg-closeryellow text-white py-3 rounded-lg font-semibold hover:bg-closeryellow/90 transition-colors">
                    {{ __('Create Account') }}
                </button>

                <p class="text-center text-gray-600 text-sm">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-closeryellow hover:text-closeryellow/90 font-semibold">Sign in</a>
                </p>
            </form>
        </div>
    </div>
@endsection

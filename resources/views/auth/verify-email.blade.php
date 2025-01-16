@extends('layouts.app')

@section('header-content')
    <div class="mx-20 absolute bottom-24">
        <h1 class="font-Inter text-white font-bold text-2xl">Verify Your Email</h1>
    </div>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-12 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Email Verification Required</h2>
                <p class="text-gray-600">Please verify your email address to continue</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="mb-6 text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-6 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif

                <div class="flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="bg-closeryellow text-white px-6 py-3 rounded-lg font-semibold hover:bg-closeryellow/90 transition-colors">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 font-semibold">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

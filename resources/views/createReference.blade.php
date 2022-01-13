@extends('layout')
@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <form method="POST" action=" {{route('references.store')}}">
                @csrf

            <!-- Email Address -->
                <div class="mt-4">
                    <x-label value="{{ __('Description') }}*" />

                    <x-input id="text" class="block mt-1 w-full" type="text" name="text" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="url" value="Url*" />

                    <x-input id="url" class="block mt-1 w-full" type="url" name="url"/>
                </div>

                <!-- Remember Me -->

                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-3">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
            <span>The description requires a minimum of 10 character length and the URL must be valid for creating the reference.</span>
        </x-auth-card>

    </x-guest-layout>

@endsection

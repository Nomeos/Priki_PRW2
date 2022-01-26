@extends('layout')
@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </x-slot>

            <form method="POST" action="/practices/store">
            @csrf

            <!-- Email Address -->
                <div class="select">
                    <select>
                        @foreach(\App\Models\Domain::all() as $domain)
                            <option>{{$domain->name}}</option>

                        @endforeach

                    </select>
                </div>

                <div class="mt-4">
                    <label for="comment">{{ __('Comment') }}:</label><br>
                    <textarea rows="4" , cols="54" id="comment" name="comment" style="resize: none;"></textarea>
                </div>

                <!-- Remember Me -->

                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-3">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>

    </x-guest-layout>

@endsection

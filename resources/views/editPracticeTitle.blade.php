@extends('layout')
@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </x-slot>

            <form method="POST" action="/practices/{{$practice->id}}/saveTitle">
                @csrf


                <div class="mt-4">
                    <x-label value="{{ __('Title') }}*"/>

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title"  required autofocus>{{$practice->title}}
                    </x-input>
                </div>


                <div class="mt-4">
                    <x-label value="{{ __('Update reasons') }}*"/>

                    <x-input id="reason" class="block mt-1 w-full" type="text" name="reason" />
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-3">
                        {{ 'Update'}}
                    </x-button>
                </div>
            </form>
            <span>The title must not exceed 40 characters and be more than 3 characters.</span>
        </x-auth-card>

    </x-guest-layout>

@endsection

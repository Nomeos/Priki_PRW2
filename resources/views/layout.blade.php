<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">




</head>
<body class="antialiased">
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="/" class="navbar-item">
                Home
            </a>

            <a href="/references" class="navbar-item">
                References
            </a>
            @if(\Illuminate\Support\Facades\Gate::allows('indexMod',\Illuminate\Support\Facades\Auth::user()))
            <a href="/practices/mod" class="navbar-item">
                Practices
            </a>
            @endif

            @yield('navbarContent')
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                @if(!Auth::check())
                    <div class="buttons">

                        <a href="/register" class="button is-primary">
                            <strong>Sign up</strong>
                        </a>
                        <a href="/login" class="button is-light">
                            Log in
                        </a>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{Auth::user()->name}}
                        </a>

                        <div class="navbar-dropdown">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
@if($errors->any())
    <h4 style="color: red;font-weight: bold">{{$errors->first()}}</h4>
@endif

@yield('content')
@livewireScripts

<script type="text/javascript" src="{{asset('js/accordion.js')}}"></script>
</body>
</html>

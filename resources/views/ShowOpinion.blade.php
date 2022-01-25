@extends('layout')
@section('content')
    @if(session()->has('ok'))
        <h4 style="color: green;font-weight: bold">{{session()->get('ok')}}</h4>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Opinion number {{$opinion->id}}
            </p>
        </header>

        <div class="card-content">
            <div class="content">
                {{$opinion->description}}

            </div>
        </div>
        <footer class="card-footer">
            <p class="card-footer-item">
                  <span>
                    Author : <a href="#">{{$opinion->user->fullname}}</a>
                  </span>
            </p>
            <p class="card-footer-item">
                  <span>
                    Date created : <a href="#">{{\Carbon\Carbon::Parse($opinion->created_at)->format("d M Y")}}</a>
                  </span>
            </p>
        </footer>
    </div>
    @if($useropinions->isEmpty())
        <div class="card">


            <div class="card-content">
                <div class="content">
                    No comments available.

                </div>
            </div>
        </div>
    @else
        @foreach($useropinions as $useropinion)
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Comment of {{$useropinion->fullname}}
                    </p>
                </header>

                <div class="card-content">
                    <div class="content">
                        {{$useropinion->pivot->comment}}

                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <button class="button accordion is-rounded is-fullwidth is-success">Comment</button>
    @if(!Auth::check())
        <div class="panel">
            You have to be connected for comment an opinion. Please <a href="/login"><u>Login</u></a> or <a
                href="/register"><u>Register</u></a>.
        </div>
    @else
        <div class="panel">
            <form method="POST" action="/opinions/{{$opinion->id}}">
                @csrf
                <div class="mt-4">
                    <label for="comment">{{ __('Comment') }}:</label><br>
                    <textarea rows="4" , cols="54" id="comment" name="comment" style="resize: none;"></textarea>
                </div>
                <div>
                    <span>The comment mustn't exceed 1000 characters length.</span>
                </div>
                <div>
                    <button class="button is-success">{{ __('Submit')}}</button>
                </div>
            </form>
        </div>

    @endif

@endsection

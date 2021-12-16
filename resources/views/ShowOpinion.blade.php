@extends('layout')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Opinion number  {{$opinion->id}}
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
                        Comment of  {{$useropinion->user->fullname}}
                    </p>
                </header>

                <div class="card-content">
                    <div class="content">
                        {{$useropinion->comment}}

                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

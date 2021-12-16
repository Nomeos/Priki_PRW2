@extends('layout')
@section('content')
    @foreach($opinions as $opinion)
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
    @endforeach
@endsection

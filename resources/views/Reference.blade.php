@extends('layout')
@section('content')
    @foreach($references as $reference)
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    {{$reference->description}}
                </p>
            </header>

            <div class="card-content">
                <div class="content">
                    <a href="{{$reference->url}}">{{$reference->url}}</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

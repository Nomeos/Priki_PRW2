@extends('layout')
@section('content')
    @if(session()->has('ok'))
        <h4 style="color: green;font-weight: bold">{{session()->get('ok')}}</h4>
    @endif
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
    <a href="references/create"><button class="button is-rounded is-fullwidth is-success">Create new reference</button></a>
@endsection

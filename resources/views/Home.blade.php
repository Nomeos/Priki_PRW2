@extends('layout')
@section('content')
    <h1>Roles</h1>
    <livewire:home-practice />
    <live
    @foreach (\App\Models\Practice::all() as $practice)
        <p>{{$practice->description}}<br>{{$practice->domain->name}}</p>
    @endforeach
@endsection

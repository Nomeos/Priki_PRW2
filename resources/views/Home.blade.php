@extends('layout')
@section('content')
    <h1>Toutes les practices !</h1>
    <livewire:home-practice :days="5" />
@endsection
@section('navbarContent')
    <livewire:navbar/>
@endsection

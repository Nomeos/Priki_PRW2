@extends('layout')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Practice number  {{$practice->id}}
            </p>
        </header>

        <div class="card-content">
            <div class="content">
                {{$practice->description}}

            </div>
        </div>
        <footer class="card-footer">
            <p class="card-footer-item">
                  <span>
                    Domain : <a href="#">{{$practice->domain->name}}</a>
                  </span>
            </p>
            <p class="card-footer-item">
                  <span>
                    Author : <a href="#">{{$practice->user->fullname}}</a>
                  </span>
            </p>
            <p class="card-footer-item">
                  <span>
                    Created : <a href="#">{{$created_at}}</a>
                  </span>
            </p>
            <p class="card-footer-item">
                  <span>
                    Updated : <a href="#">{{$updated_at}}</a>
                  </span>
            </p>


        </footer>
    </div>
@endsection

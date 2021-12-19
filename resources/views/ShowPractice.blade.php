@extends('layout')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Practice number {{$practice->id}}
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
                    Created : <a href="#">{{\Carbon\Carbon::PARSE($practice->created_at)->format("d M Y")}}</a>
                  </span>
            </p>
            <p class="card-footer-item">
                  <span>
                    Updated : <a href="#">{{\Carbon\Carbon::PARSE($practice->updated_at)->format("d M Y") }}</a>
                  </span>
            </p>


        </footer>
    </div>
    @foreach($opinions as $opinion)
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Comment number {{$opinion->id}}
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
                <p class="card-footer-item">
                  <span>
                      Number of comments ({{$opinion->userOpinion()->get()->count()}})
                  </span>
                </p>
                <p class="card-footer-item">
                  <span>
                      <i class="fa fa-thumbs-up"></i> ({{$opinion->getUpVote()}})      <i class="fa fa-thumbs-down"></i> ({{$opinion->getDownVote()}})
                  </span>
                </p>
            </footer>
        </div>
    @endforeach
@endsection

@extends('layout')
@section('content')
    @foreach(\App\Models\Domain::all() as $domain)
        <div class="card">
            <header class="card-header">
                <p class="card-header-title title is-2">
                    {{$domain->name}}
                </p>
            </header>
        </div>
        @if($domain->practices->isEmpty())
            <div class="card">

                <div class="card-content">
                    <div class="content">
                        No practices with this domain.
                    </div>
                </div>
            </div>
        @else
            @foreach($practices as $practice)
                @if($practice->domain_id === $domain->id)
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Practice of : {{\App\Models\User::find($practice->user_id)->fullname}}
                            </p>
                        </header>
                        <div class="card-content">
                            <a href="/practices/{{$practice->id}}">
                                <div class="content">
                                    {{$practice->description}}
                                </div>
                            </a>
                        </div>

                        <footer class="card-footer">
                            <p class="card-footer-item">
                  <span>
                    Date created : <a href="#">{{\Carbon\Carbon::Parse($practice->created_at)->format("d M Y")}}</a>
                  </span>
                            </p>
                            <p class="card-footer-item">
                  <span>
                    Publication state : <a
                          href="#">{{\App\Models\PublicationState::find($practice->publication_state_id)->name}}</a>
                  </span>
                            </p>

                        </footer>
                    </div>
                @endif
            @endforeach
        @endif

    @endforeach
@endsection

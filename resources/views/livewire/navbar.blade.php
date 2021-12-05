
<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link">
        Domains ({{$practicesNumber}})
    </a>
    <div class="navbar-dropdown">
        @foreach($domains as $domain)
            <a class="navbar-item">
                {{$domain->name}} ({{$domain->practices()->count()}})
            </a>
        @endforeach
    </div>
</div>

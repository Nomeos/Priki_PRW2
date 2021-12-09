<div>
    Toutes les practices de : {{$this->domain->name}}
    @foreach ($this->practices as $practice)
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Domain: {{$this->practice->domain->name}}
                </p>
            </header>

            <div class="card-content">
                <div class="content">
                    {{$this->practice->description}}
                </div>
            </div>
        </div>
    @endforeach
</div>

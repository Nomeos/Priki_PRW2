<div>
    Afficher les practices jeunes de <input style="width: 50px" wire:model="days" wire:type="number"> jours.
    @foreach ($practices as $practice)

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Domain: {{$practice->domain->name}} Date
                    : {{\Carbon\Carbon::Parse($practice->updated_at)->format("d M Y")}}
                </p>
            </header>

            <div class="card-content">
                <a href="/practices/{{$practice->id}}">
                    <div class="content">
                        {{$practice->description}}
                    </div>
                </a>
            </div>
        </div>

    @endforeach
</div>

<div>
    Afficher les practices jeunes de <input wire:model="days" wire: type="number"> jours.
    @foreach ($practices as $practice)
        <p>{{$practice->description}}<br>{{$practice->domain->name}}</p>
    @endforeach
</div>

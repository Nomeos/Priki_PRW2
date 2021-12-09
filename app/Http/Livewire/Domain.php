<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Livewire\Component;

class Domain extends Component
{
    public $practices;
    public $domain;

    public function mount()
    {
        $this->practices = Practice::where('domain_id', $this->domain->id)->get();
    }

    public function render()
    {
        return view('livewire.domain');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Livewire\Component;
use App\Models\Domain;

class Navbar extends Component
{
    public $domains;
    public $practicesNumber;

    public function render()
    {
        $this->domains = Domain::all();
        $this->practicesNumber = Practice::all()->count();
        return view('livewire.navbar');
    }
}

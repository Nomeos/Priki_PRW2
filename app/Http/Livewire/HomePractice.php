<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Carbon\Carbon;
use Livewire\Component;

class HomePractice extends Component
{
    public $practices;
    public $days;

    public function render()
    {
        $this->practices = Practice::where('updated_at', '>=', Carbon::now()->subDays($this->days))
            ->whereHas('publicationState', function ($q) {
                $q->where('slug', 'PUB');
            })->get();
        return view('livewire.home-practice', ['practices' => $this->practices]);
    }
}

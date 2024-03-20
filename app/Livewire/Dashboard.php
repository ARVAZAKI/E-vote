<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;

class Dashboard extends Component
{
    public $candidate_id;
    public $vote;
    public function render()
    {
        $candidatebem = Candidate::where('category','BEM')->get();
        $candidateblm = Candidate::where('category','BLM')->get();
         return view('livewire.dashboard', compact('candidatebem','candidateblm'));
    }
    public function voters($itemId)
    {
        $this->candidate_id = $itemId;
    }

}

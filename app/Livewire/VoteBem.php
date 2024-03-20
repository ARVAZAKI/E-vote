<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class VoteBem extends Component
{
    public $pending_bem_id;
    public function pilih($id)
{
    $this->pending_bem_id = $id;
}

public function fixPilih()
{
    $id = $this->pending_bem_id;
    User::where('id', Auth::user()->id)->update([
        'pending_bem_id' => $id
    ]);
    return redirect('/vote/blm');
}
    public function render()
    {
        $candidatebem = Candidate::with('vision','mission')->where('category', 'BEM')->get();
        return view('livewire.vote-bem',compact('candidatebem'));
    }

}

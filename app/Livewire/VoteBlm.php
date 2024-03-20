<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class VoteBlm extends Component
{
    public $pending_blm_id;
    public function pilih($id){
        $this->pending_blm_id = $id;
    }
    public function fixPilih(){
        $id = $this->pending_blm_id;
        User::where('id', Auth::user()->id)->update([
            'pending_blm_id' => $id
        ]);
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('message','Terimakasih telah memilih..');
    }
    public function render()
    {
        $candidateblm = Candidate::with('vision','mission')->where('category', 'BLM')->get();
        return view('livewire.vote-blm', compact('candidateblm'));
    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;

class ListAccount extends Component
{
    public $userId;
    public function render()
    {
        $user = User::where('role','mahasiswa')->whereNotNull('photo')->orderBy('created_at','desc')->paginate(3);
        return view('livewire.list-account', compact('user'));
    }
    public function tidakSahConfirm($id){
        $this->userId = $id;
    }
    public function tidakSah(){
        $id = $this->userId;
        User::findOrFail($id)->update(['status' => 'tidak sah']);
        return redirect()->back();
    }
    public function sahConfirm($id){
        $this->userId = $id;
    }
    public function sah(){
        $id = $this->userId;
        $bem = User::where('id', $id)->value('pending_bem_id');
        $blm = User::where('id', $id)->value('pending_blm_id');
        User::findOrFail($id)->update(['status' => 'sah']);
        $candidateBem = Candidate::find($bem);
        $candidateBem->vote_count += 1;
        $candidateBem->vote += 1;
        $candidateBem->save();
        $candidateBlm = Candidate::find($blm);
        $candidateBlm->vote_count += 1;
        $candidateBlm->vote += 1;
        $candidateBlm->save();
        return redirect()->back();
    }
}

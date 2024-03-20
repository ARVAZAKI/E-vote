<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithPagination;

class Candidates extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $query;
    public $candidate_id;
    public function render()
    {
        if($this->query != null){
            $candidate = Candidate::where('name', 'like', "%". $this->query . "%")->orderBy('category')->paginate(3);
        }else{
              $candidate = Candidate::orderBy('category')->paginate(3);;
        }
        return view('livewire.candidates',compact('candidate'));
    }
    public function delete(){
        $id = $this->candidate_id;
        Candidate::findOrFail($id)->delete();
        return redirect()->back()->with('message','candidate deleted...');
        $this->clear();
    }
    public function delete_confirmation($id){
        $this->candidate_id = $id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;

class voteController extends Controller
{
    public function votebem(){
        return view('vote.votebem');
    }
    public function voteblm(){
        return view('vote.voteblm');
    }
    public function setVote(){
        return view('admin.listaccount');
    }
   
}

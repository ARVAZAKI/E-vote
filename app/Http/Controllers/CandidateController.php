<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use App\Models\Mission;
use App\Models\Category;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateVisionRequest;
use App\Http\Requests\CreateCandidateRequest;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    public function candidates(){
        //menampilkan data kandidat
        return view('admin.candidates');
    }
    public function addCandidate(){
        return view('admin.add-candidate');
    }
    public function postCandidate(CreateCandidateRequest $request){
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newName = $request->name . now()->timestamp . '.' . $extension;
        $request->file('photo')->storeAs('foto',$newName);
        $candidate = new Candidate();
        $candidate->npm = $request->npm;  
        $candidate->name = $request->name;
        $candidate->category = $request->category;
        $candidate->photo = $newName;
        $candidate->vote_count = 0;
        $candidate->vote = 0;
        $candidate->save();
        return redirect()->back()->with('message','create data successfully...');
    }
    public function editCandidate(Request $request,$id){
        $candidate = Candidate::with('vision','mission')->where('id',$id)->firstOrFail();
        return view('admin.edit-candidate', compact('candidate'));
    }
    public function updateCandidate(Request $request, $id){
        $candidate = Candidate::findOrFail($id);
        if($request->photo != null){
        $oldPhoto = $candidate->photo;
        $path = './template/foto/' . $oldPhoto;
        if (File::exists($path)) {
            File::delete($path);
        }
        $newPhoto = $request->file('photo');
        $fileName = $candidate->name . now()->timestamp . '.' . $newPhoto->getClientOriginalExtension();
        $newPhoto->move('./template/foto/', $fileName);
            $candidate->npm = $request->npm;
            $candidate->name = $request->name;
            $candidate->photo = $newPhoto;
            $candidate->category = $request->category;
            $candidate->update();
        }else{
            $candidate = Candidate::findOrFail($id);
            $candidate->npm = $request->npm;
            $candidate->name = $request->name;
            $candidate->category = $request->category;
            $candidate->save();
        }
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'vision') === 0 && $value !== null) {
                $visionId = $request->input('vision_id' . substr($key, strlen('vision')));
                Vision::where(["id" => $visionId, "candidate_id" => $id])
                    ->update([
                        'candidate_id' => $request->candidate_id,
                        'vision' => $value,
                    ]);
            }
        }
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'mission') === 0 && $value !== null) {
                $missionId = $request->input('mission_id' . substr($key, strlen('mission')));
                Mission::where(["id" => $missionId, "candidate_id" => $id])
                    ->update([
                        'candidate_id' => $request->candidate_id,
                        'mission' => $value,
                    ]);
            }
        }
        return redirect('/admin/candidates')->with('message','update data successfully...');
    }
    public function addCandidateVision(Request $request){
        $candidate = Candidate::orderBy('category')->get();
        return view('admin.add-vision', compact('candidate'));
    }
    public function postCandidateVision(CreateVisionRequest $request){
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'vision') === 0 && $value !== null) {
                    Vision::create([
                        'candidate_id' => $request->input('candidate_id'),
                        'vision' => $value,
                    ]);
                }
            }
            return redirect()->back()->with('message', 'create vision success');       
    }
    public function addCandidateMission(){
        $candidate = Candidate::orderBy('category')->get();
        return view('admin.add-mission',compact('candidate'));
    }
    public function postCandidateMission(Request $request){
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'mission') === 0 && $value !== null) {
                Mission::create([
                    'candidate_id' => $request->input('candidate_id'),
                    'mission' => $value,
                ]);
            }
        }
        return redirect()->back()->with('message', 'create mision success');
    }
}

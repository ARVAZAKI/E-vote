@extends('layouts.admin')
@section('content')
<h4>Edit Candidate {{ $candidate->name }}</h4>
<div class="row d-flex justify-content-space-evenly">
    <div class="col-lg-4">
        <div class="card shadow-lg">
            <div class="card-body">
               <form action="{{route('updateCandidate',$candidate->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" class="form-control" name="npm" id="npm" value="{{$candidate->npm}}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$candidate->name}}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" disabled placeholder="{{$candidate->category}}">
                    <input type="hidden" id="category" name="category" value="{{$candidate->category}}">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label> <br>
                    <img src= "{{ asset('/storage/foto/' .$candidate->photo) }}" width="100" class = "img-thumbnail mb-2">
                    <input type="file" class="form-control" name="photo" id="photo" value="{{$candidate->photo}}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="mb-3">
                    <input type="hidden" name="candidate_id" id="candidate_id" value="{{$candidate->id}}">
                </div>
              <div id="input-container">
                    <div class="mb-3" id="input-vision">
                  <label for="vision" class="form-label">Vision</label>
                 @foreach ($candidate->vision as $vision) 
                    <input type="hidden" name="vision_id{{$loop->iteration}}" id="vision_id{{$loop->iteration}}" value="{{$vision->id}}">
                    <textarea class="form-control mb-2"
                        name="vision{{$loop->iteration}}" id="vision{{$loop->iteration}}"
                      cols="30" rows="2">{{$vision->vision}}</textarea>
                 @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="mb-3">
                    <input type="hidden" name="candidate_id" id="candidate_id" value="{{$candidate->id}}">
                </div>
              <div id="input-container">
                    <div class="mb-3">
                  <label for="mission" class="form-label">Mission</label>
                 @foreach ($candidate->mission as $mission) 
                 <input type="hidden" name="mission_id{{$loop->iteration}}" id="mission_id{{$loop->iteration}}" value="{{$mission->id}}">
                    <textarea class="form-control mb-2"
                        name="mission{{$loop->iteration}}" id="mission{{$loop->iteration}}"
                  cols="30" rows="2">{{$mission->mission}}</textarea>
                 @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
    <div>
        <a href="/admin/candidates" class="btn btn-primary">Back</a>
        <input type="submit" class="btn btn-success" value="Save">
    </div>
</form>
</div>
@endsection
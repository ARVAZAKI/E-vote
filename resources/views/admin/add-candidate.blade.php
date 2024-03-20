@extends('layouts.admin')
@section('content')
<div>
    <div class="container-fluid">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add Candidate</h5>
            <div class="card">
              @if ($errors->any())
                  <div class="alert alert-danger mt-1 mb-3">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>- {{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif
              @if (Session::has('message'))
                  <div class="alert alert-success">{{Session::get('message')}}</div>
              @endif
              <div class="card-body">
                <form action="{{route('createCandidate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nim" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="" class="mb-1">SELECT CATEGORY</option>
                            @foreach (\App\Models\Candidate::getCategory() as $category)
                            <option value="{{$category}}" class="mb-1">{{$category}}</option>
                            @endforeach
                          </select>
                    </div>
                  <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="npm" name="npm">
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>@endsection
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Mission</h5>
        <div class="card">
          @if (Session::has('message'))
              <div class="alert alert-success">{{Session::get('message')}}</div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>- {{$error}}</li>
                  @endforeach
                </ul>
              </div>
          @endif
          <div class="card-body">
            <form action="{{route('createMission')}}" method="post">
                @csrf
             <div class="mb-3">
                    <label for="nim" class="form-label">Candidate Name</label>
                    <select name="candidate_id" id="candidate_id" class="form-select">
                        <option value="" class="mb-1">SELECT CANDIDATE</option>
                        @foreach ($candidate as $item)
                        <option value="{{$item->id}}" class="mb-1">{{$item->category}} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
              <div id="input-container">
                    <div class="mb-3">
                  <label for="mission" class="form-label">Mission</label>
                  @for ($i = 1; $i <= 1; $i++)
                  <input type="text" class="form-control"             
                  id="mission{{$i}}" name="mission{{$i}}"
                  @endfor
                  >
                </div>
              </div>
              @for ($i = 2; $i <= 9; $i++)
              <div id="container-input{{$i}}"></div>
              @endfor
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-success" onclick="addInput()">+</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
  let counter = 1;

  function addInput() {
      counter++;

      const newInput = `
          <div class="mb-3">
              <input type="text" class="form-control" id="mission${counter}" name="mission${counter}" value="">
          </div>`;

      document.getElementById(`container-input${counter}`).innerHTML += newInput;
  }
</script>
@endsection
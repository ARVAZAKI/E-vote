@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        @error('npm')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="card-body">
            <form action="/account/voters" method="post">
                <div class="mb-3">
                    @for ($i = 1; $i <= 1; $i++)
                    <label class="form-label" for="npm">NPM</label>
                    <input type="number" class="form-control" name="npm{{$i}}" id="npm{{$i}}" placeholder="NPM" required>
                    <label for="password" class="form-label" for="password">Password</label>
                    <input type="number" class="form-control" name="password{{$i}}" id="password{{$i}}" placeholder="Password">
                    @endfor
                </div>
                        @for ($i = 2; $i <= 10; $i++)
                        <div id="input-container{{$i}}">
                        </div>
                        @endfor
                <input type="submit" class="btn btn-primary" value="Simpan">
                <button type="button" class="btn btn-success" onclick="addInput()">+</button>
                @csrf
            </form>
        </div>
    </div>
</div>
<script>
    let counter = 1;
  
    function addInput() {
        counter++;
  
        const newInput = ` <div class="mb-3">
                        <label class="form-label" for="npm">NPM</label>
                        <input type="number" class="form-control" name="npm${counter}" id="npm" placeholder="NPM" required>
                        <label for="password" class="form-label" for="password">Password</label>
                        <input type="number" class="form-control" name="password${counter}" id="password${counter}" placeholder="Password">
                    </div>`;
  
        document.getElementById(`input-container${counter}`).innerHTML += newInput;
    }
  </script>
@endsection

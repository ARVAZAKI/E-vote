<div>
    {{-- <div class="row d-flex justify-content-space-evenly">
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    Category : BEM <br>
                    jumlah pemilih : {{$votebem}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    Category : BLM <br>
                    jumlah pemilih : {{$voteblm}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    Jumlah User yang telah memilih keduanya :
                    {{$totalVote}}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center fw-bold">BEM</div>
                <div class="card-body">
                    <div class="row d-flex justify-content-evenly align-items-center">
                        @foreach ($candidatebem as $item)
                            <div class="col-lg-3">
                            <div class="card shadow-md">
                                <div class="card-body">
                                    <img src="{{asset('/storage/foto/'.$item->photo)}}" class="img-thumbnail ">
                                    <h5 class="text-center">{{$item->name}}</h5>
                                    <div class="d-flex justify-content-evenly">
                                        <p class="text-center">Jumlah vote :  <span class="fw-bold text-primary" style="display: none;" id="jumlahbem{{$item->id}}">{{$item->vote_count}}</span></p>
                                    <button onclick="toggleVisibility{{$item->id}}()" class="p-2" style="border:none; border-radius:10px;"><i class="fa fa-eye-slash" style="font-size:20px;"></i>
                                    </button>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center fw-bold">BLM</div>
                <div class="card-body">
                    <div class="row d-flex justify-content-evenly align-items-center">
                        @foreach ($candidateblm as $item)
                             <div class="col-lg-3">
                            <div class="card shadow-md">
                                <div class="card-body">
                                    <img src="{{asset('/storage/foto/'.$item->photo)}}" class="img-thumbnail">
                                    <h5 class="text-center">{{$item->name}}</h5>
                                    <div class="d-flex justify-content-evenly">
                                        <p class="text-center">Jumlah vote :  <span class="fw-bold text-primary" style="display: none;" id="jumlahblm{{$item->id}}">{{$item->vote_count}}</span></p>
                                    <button onclick="toggleVisibilityblm{{$item->id}}()" class="p-2" style="border:none; border-radius:10px;"><i class="fa fa-eye-slash" style="font-size:20px;"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="voters" tabindex="-1" aria-labelledby="voters" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="pilih">Edit Voters</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div>
                <input type="number" class="form-control" placeholder="Jumlah Vote" wire:model="vote">
             </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="editVote()" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        function toggleVisibility1() {
  var jumlahSpan = document.getElementById('jumlahbem1');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility2() {
  var jumlahSpan = document.getElementById('jumlahbem2');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility3() {
  var jumlahSpan = document.getElementById('jumlahbem3');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility4() {
  var jumlahSpan = document.getElementById('jumlahbem4');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility5() {
  var jumlahSpan = document.getElementById('jumlahbem5');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility6() {
  var jumlahSpan = document.getElementById('jumlahbem6');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility7() {
  var jumlahSpan = document.getElementById('jumlahbem7');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility8() {
  var jumlahSpan = document.getElementById('jumlahbem8');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility9() {
  var jumlahSpan = document.getElementById('jumlahbem9');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibility10() {
  var jumlahSpan = document.getElementById('jumlahbem10');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
   
        function toggleVisibilityblm1() {
  var jumlahSpan = document.getElementById('jumlahblm1');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm2() {
  var jumlahSpan = document.getElementById('jumlahblm2');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm3() {
  var jumlahSpan = document.getElementById('jumlahblm3');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm4() {
  var jumlahSpan = document.getElementById('jumlahblm4');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm5() {
  var jumlahSpan = document.getElementById('jumlahblm5');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm6() {
  var jumlahSpan = document.getElementById('jumlahblm6');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm7() {
  var jumlahSpan = document.getElementById('jumlahblm7');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm8() {
  var jumlahSpan = document.getElementById('jumlahblm8');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm9() {
  var jumlahSpan = document.getElementById('jumlahblm9');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
        function toggleVisibilityblm10() {
  var jumlahSpan = document.getElementById('jumlahblm10');
  jumlahSpan.style.display = (jumlahSpan.style.display === 'none') ? 'inline' : 'none';
}
      </script>
</div>

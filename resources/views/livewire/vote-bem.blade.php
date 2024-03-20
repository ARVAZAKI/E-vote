<div>
    <div class="header">
        <img src={{asset("./assets/photo/logoupnbaru.png")}} alt="logo" class="logo" />
        <div class="welcome">
          <h4>Welcome, {{Auth::user()->email}}</h4>
        </div>
      </div>
      <div class="textrul">
        <h1>BEM</h1>
        <p>Pilihlah kandidat sesuai hati nurani</p>
      </div>
      <div class="voting">
       <div class="">
        <div class="row d-flex justify-content-center mt-3 mx-1">
          @foreach ($candidatebem as $item)
          <div class="col-lg-4 mt-2 col-md-6 col-lg-4">
            <div class="card" id="card-{{$loop->iteration}}">
                    <img class="card-img-top mt-2 img-responsive" src="{{asset('/storage/foto/'.$item->photo)}}" alt="Card image" />
                    <div class="card-body" id="card-body-{{$loop->iteration}}">
                      <h4 class="card-title">Nama: {{$item->name}}</h4>
                      <h4 class="card-text">NPM: {{$item->npm}}</h4>
                      <div class="dropdown">
                        <button class="dropbtn" onclick="toggleDropdown('dropdown-content-{{$loop->iteration}}', 'card-body-{{$loop->iteration}}')">Visi dan Misi</button>
                        <div id="dropdown-content-{{$loop->iteration}}" class="dropdown-content">
                          <div class="mb-2">
                            <h4 class="mb-2 text-primary mt-1">Visi</h4>
                           @foreach ($item->vision as $vision)
                               - {{$vision->vision}} <br>
                           @endforeach
                           <hr>
                           <h4 class="mb-2 text-danger mt-1">Misi</h4>
                           @foreach ($item->mission as $mission)
                               - {{$mission->mission}} <br>
                           @endforeach
                          </div>
                        </div>
                      </div>
                      <br />
                      <button wire:click="pilih({{$item->id}})" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#pilih">Pilih</button>
                    </div>
                  </div>
          </div>   
          @endforeach    
        </div>
       </div>
      </div>
  
      <script src="/assets/js/DropDown.js"></script>
      <section class="footer">
        <footer>
          <div class="container">
            <p class="copyright">
              Copyright ©2024 | All Rights Reserved <br />
              Designed By @DigiCraft.ID
            </p>
          </div>
        </footer>
      </section>
  
      <script src={{asset("/js/DropDown.js")}}></script>
      {{-- modal --}}
      <div wire:ignore.self class="modal fade" id="pilih" tabindex="-1" aria-labelledby="pilih" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="pilih">Notification</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah kamu yakin memilih kandidat ini?
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="fixPilih()" class="btn btn-primary">Pilih</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div>
    <div class="container">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">List Pemilih</h5>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>foto</th>
                            <th>email</th>
                            <th>vote bem</th>
                            <th>vote blm</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $item)
                        <tr>
                            <td>{{$user->firstItem() + $key}}</td>
                            <td><img src="{{asset('/storage/foto/'.$item->photo)}}" alt="foto pemilih" height="60"></td>
                            <td>{{$item->email}}</td>
                            <td class="text-center fs-6">@if ($item->pending_bem_id != null)
                                ✔
                                @else ✖
                            @endif</td>
                            <td class="text-center fs-6">@if ($item->pending_blm_id != null)
                                ✔
                                @else ✖
                            @endif</td>
                            <td
                            @if ($item->status == "belum sah")
                                class = "text-warning"
                            @endif
                            @if ($item->status == "sah")
                                class = "text-success"
                            @endif
                            @if ($item->status == "tidak sah")
                                class = "text-danger"
                            @endif
                            >{{$item->status}}</td>
                            <td>
                                @if ($item->status == 'belum sah' && $item->pending_bem_id != null && $item->pending_blm_id != null)
                                <a wire:click="sahConfirm({{$item->id}})" disabled class="btn btn-success btn-sm"data-bs-toggle="modal" data-bs-target="#sah">SAH</a>
                                <a wire:click="tidakSahConfirm({{$item->id}})" disabled class="btn btn-danger btn-sm"data-bs-toggle="modal" data-bs-target="#tidaksah">TIDAK SAH</a>
                                @else
                                <button class="btn btn-sm btn-success" disabled>SAH</button>
                                <button class="btn btn-sm btn-danger" disabled>TIDAK SAH</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{$user->links()}}
                </table>
                </div>
              </div>
            </div>
        </div>
     </div>
     <div wire:ignore.self class="modal fade" id="tidaksah" tabindex="-1" aria-labelledby="tidaksah" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModal">Nyatakan Tidak Sah?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin menyatakan tidak sah?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" wire:click="tidakSah()" class="btn btn-danger" data-bs-dismiss="modal">Tidah Sah</button>
            </div>
          </div>
        </div>
      </div>
     <div wire:ignore.self class="modal fade" id="sah" tabindex="-1" aria-labelledby="sah" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="sah">Nyatakan Sah?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin menyatakan sah?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" wire:click="sah()" class="btn btn-success" data-bs-dismiss="modal">Sah</button>
            </div>
          </div>
        </div>
      </div>
 </div>

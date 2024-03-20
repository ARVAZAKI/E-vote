<div>
    <div class="container-fluid">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">List Candidates</h5>
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
              <div class="card-body">
                <div>
                    <input type="text" class="form-control w-40 mb-3" placeholder="Search By Name..." wire:model.live="query">
                </div>
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($candidate as $item)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="/admin/edit-candidate/{{$item->id}}" class="btn btn-warning btn-sm">Edit</a>
                            <a wire:click="delete_confirmation({{$item->id}})" class="btn btn-danger btn-sm"data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                    {{$candidate->links()}}
                </table>
                </div>
                
              </div>
            </div>
        </div>
     </div>
     <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModal">Delete Alert</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure to delete this candidate?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" wire:click="delete()" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
 </div>

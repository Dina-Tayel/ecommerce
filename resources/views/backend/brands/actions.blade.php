<div style="display: flex">

    <a href="{{ route('brands.edit', $id)}}" class=" mx-1 btn btn-info btn-sm show_confirm" > <i class="ri-edit-line "></i></a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$id}}">
    <i class="ri-delete-bin-line"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('brands.destroy', $id)}}" >
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="modal-body">
              Are You Sure You Want to delete this item ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
      </div>
    </div>
    
  </div>

</div>
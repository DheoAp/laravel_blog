@if (session()->has('pesan'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <span>{{ session()->get('pesan') }}</span>
  </div>
@endif

@extends('layout-master.template',['title' =>'Tag'])
@section('content')
<div class="container my-3">
  <div class="row">
    <div class="col-md">
      
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      @if (session()->has('pesan'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <span>{{ session()->get('pesan') }}</span>
        </div>
      @endif
     <table class="table">
       <thead>
         <tr>
           <th>No</th>
           <th>Nama</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody>
        @foreach ($tag as $tag)
          <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $tag->nama }}</td>
            <td>
              <div class="justify-content-center">
                <a href="{{ url('tag/hapus/'.$tag->slug )}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                <a href="{{ url('tag/edit/'.$tag->slug )}}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
              </div>
            </td>
          </tr>
        @endforeach
         
       </tbody>
     </table>
    </div>

    <div class="col-md">
      <form method="post" action="{{ url('tag/proses') }}">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Tag</label>
          <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Tag">
          @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success btn-sm">Submit</button>
      </form>
    </div>

  </div>
</div>
@endsection

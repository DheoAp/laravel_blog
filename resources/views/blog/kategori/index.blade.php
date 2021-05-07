@extends('layout-master.template',['title' =>'Kategori Blog'])
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
           @foreach ($kategori as $item)
              <tr>
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>
              <td>
                <div class="justify-content-center">
                 
                  @if (!$item->blog->count())
                    {{-- Jika blog tidak memilki kategori/blog tidak ada, maka button hapus akan muncul --}}
                    <a href="{{ url('kategori/delete/'.$item->slug) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                  @else
                    {{-- Jika blog memilki kategori, maka button hapus tidak akan muncul --}}
                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash"></i></button>
                  @endif
                
                  <a href="{{ url('kategori/edit/'.$item->slug) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                </div>
              </td>
            </tr>
           @endforeach
           
         </tbody>
       </table>
      </div>

      <div class="col-md">
        <form method="post" action="{{ url('/kategori/proses') }}">
          @csrf
          <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Kategori">
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
        Kategori tidak bisa di hapus.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

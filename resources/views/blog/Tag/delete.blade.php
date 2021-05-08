@extends('layout-master.template',['title' =>'Hapus Tag'])
@section('content')
  <div class="container my-3">
    <div class="d-flex justify-content-center">
      <form method="post" action="{{ url('tag/hapus/'.$tag->slug) }}">
        @csrf
        @method('delete')
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Hapus {{ $tag->nama }}</h5>
            <p class="card-text">Apa anda yakin ingin hapus <b>{{ $tag->nama }}</b>?</p>
            <button type="submit" class="btn btn-primary btn-sm">Ya</button>
            <a href="{{ url('tag') }}" class="btn btn-danger btn-sm">Tidak</a>
          </div>
        </div>
      </form>
    </div>
    
  </div>
@endsection
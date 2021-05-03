@extends('layout-master.template',['title' =>$blog->judul])
@section('content')
  <div class="container my-3">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <h4>{{ $blog->judul }}</h4>
        <small>Kategori: <a href="{{ url('kategori/'.$blog->kategori->slug) }}">{{$blog->kategori->nama }}</a></small><br>
        @foreach ($blog->tag as $tag)
          @php
            // Warna Random
            $warna =['primary','secondary','success','danger','warning','info'];
            $warnaBadge = $warna[array_rand($warna)];
          @endphp
          <span class="badge badge-pill badge-{{ $warnaBadge }}">{{ $tag->nama }}</span>
        @endforeach
        <br>
        <small class="text-secondary">{{ $blog->penulis }} &bullet; {{ $blog->created_at->format('d F, Y') }} 
          <a href="{{ url('blog/edit/'.$blog->slug) }}" title="Edit Blog"><i class="fas fa-pen"></a></i> 
          <a  data-toggle="modal" data-target="#modelId" href="#"><i class="fas fa-trash text-danger" title="Delete Blog"></i></a>
        </small>
        <p>{{ $blog->body }}</p>
      </div>
    </div>
  </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $blog->judul }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <span>Apakah Anda Yakin Ingin Menghapusnya?</span>
        <div class="text-secondary">
          <small>Publish: {{$blog->created_at->format('d F, Y')}}</small>
        </div>
        <form class="mt-3 d-flex" action="{{ url('/blog/hapus/'.$blog->slug) }}" method="post">
          @csrf
          @method('delete')
            <button type="submit" class="btn btn-danger btn-sm mr-3">Ya</button>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>

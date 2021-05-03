@extends('layout-master.template',['title' =>'Beranda'])
@section('content')
<div class="container my-3">
	@include('layout-master.alert')

	<div class="d-flex justify-content-between">
		<div class="">
			<a href="{{ url('/create') }}" class="btn btn-primary btn-sm">Tambah Blog</a>
		</div>
		<div class="">
			@if (isset($kategori))
				<h3>Kategori: {{ $kategori->nama }}</h3>
			@else
				<h3>Semua Blog</h3>
			@endif
		</div>
	</div>
	
	<hr>
	<div class="row">
		@forelse ($blog as $b)
		<div class="col-md-3 d-flex justify-content-center">
			<div class="card mb-2" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title mb-0">{{ $b->judul }}</h5>
					<small>Kategori: <a href="{{ url('kategori/'.$b->kategori->slug) }} ">{{ $b->kategori->nama }}</a></small><br>
					<small class="card-subtitle mb-2 text-muted">{{ $b->penulis}} &bullet; {{ $b->created_at->format('d F, Y') }}</small>
					<p class="card-text">{{ Str::words($b->body, 10) }}</p>
					<a href="{{ url('blog/'.$b->slug) }}" class="card-link">Baca Selengkapnya</a>
				</div>
			</div>
		</div>
		@empty
		<div class="col-md">
			<div class="alert alert-warning" role="alert">
				<h5>Tidak Ada Blog di Sini</h5>
			</div>
		</div>
		@endforelse
	</div>

	<div class="row my-5">
		<div class="col-md d-flex justify-content-center">
		 {{ $blog->links('pagination::bootstrap-4') }}
		</div>
	</div>
</div>
@endsection

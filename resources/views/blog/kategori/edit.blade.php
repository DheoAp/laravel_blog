@extends('layout-master.template',['title' =>'Ubah'])
@section('content')
<div class="col-md">
  <form method="post" action="{{ url('/kategori/edit/'.$kategori->slug) }}">
    @csrf
    @method('patch')
    @include('blog.kategori.form_controll')
  </form>
</div>
@endsection
@extends('layout-master.template',['title' =>'Tambah Blog'])
@section('content')
<div class="container my-4">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <form method="post" action="{{ url('/store')}}">
        @csrf
      
        @include('blog.form_control', ['button' => 'Simpan'] )
        
      </form>
    </div>
  </div>
</div>
@endsection


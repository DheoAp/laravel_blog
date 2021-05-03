@extends('layout-master.template',['title' =>'Edit Blog '.$blog->judul])
@section('content')
<div class="container my-4">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <form method="post" action="{{ url("/blog/edit/".$blog->slug) }}">
        @csrf
        @method('PATCH')
      
        @include('blog.form_control',['button' => 'Update'])
        
      </form>
    </div>
  </div>
</div>
@endsection


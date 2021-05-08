@extends('layout-master.template',['title' =>'Edit Tag'])
@section('content')
<form method="post" action="{{ url('tag/proses') }}">
  @csrf
  @method('patch')
  <div class="form-group">
    <label for="nama">Nama Tag</label>
    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Tag">
    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <button type="submit" class="btn btn-success btn-sm">Submit</button>
</form>
@endsection
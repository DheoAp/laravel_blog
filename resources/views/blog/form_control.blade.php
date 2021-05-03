<div class="form-group">
  <label for="judul">Judul Blog</label>
  <input type="text" name="judul" value="{{ old('judul') ?? $blog->judul }}" class="form-control @error('judul') is-invalid @enderror" id="nama" placeholder="Masukan Judul">
  @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
  <label for="kategori">Kategori Blog</label>
  <select name="kategori" class="custom-select @error('kategori') is-invalid @enderror">
    <option disabled selected>Pilih</option>
    @foreach ($kategori as $item )
        <option {{ $item->kategori_id == $blog->kategori_id ? 'selected' : '' }} value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
    @endforeach
  </select>
  @error('kategori')<div class="invalid-feedback">{{$message }}</div>@enderror
</div>

<div class="form-group">
  <label for="penulis">Penulis</label>
  <input type="text" name="penulis" value="{{ old('penulis') ?? $blog->penulis }}" class="form-control @error('penulis') is-invalid @enderror" id="nama" placeholder="Masukan Penulis">
  @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
  <label for="body">Body</label>
  <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" placeholder="Masukan Isi Blog">{{ old('body')?? $blog->body }}</textarea>
  @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<a href="{{ url('/blog') }}" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</a>
<button type="submit" class="btn btn-primary btn-sm">{{ $button ?? '' }}</button>

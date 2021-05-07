<div class="form-group">
  <label for="nama">Nama Kategori</label>
  <input type="text" name="nama" value="{{ old('nama') ?? $kategori->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Kategori">
  @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<button type="submit" class="btn btn-success btn-sm">Update</button>
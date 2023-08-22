<form action="{{ route('jabatan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="basicInput">Nama</label>
        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="basicInput" name="jabatan"
            placeholder="Masukan Nama" value="{{ old('jabatan') }}" required />
        @error('jabatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
</form>

<form action="{{ route('departement.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="basicInput">Nama</label>
        <input type="text" class="form-control @error('nama_departement') is-invalid @enderror" id="basicInput"
            name="nama_departement" placeholder="Masukan Nama" value="{{ old('nama_departement') }}" required />
        @error('nama_departement')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
</form>

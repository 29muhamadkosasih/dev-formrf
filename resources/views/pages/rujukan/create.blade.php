<form action="{{ route('rujukan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="basicInput">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="basicInput" name="name"
            placeholder="Masukan Nama" value="{{ old('name') }}" required />
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
</form>
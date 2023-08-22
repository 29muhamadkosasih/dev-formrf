<form action="{{ route('norek.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="basicInput">Nama Bank</label>
        <select class="form-select @error('bank_id') is-invalid @enderror" id="selectDefault" name="bank_id"
            value="{{ old('bank_id') }}">
            <option selected>Open this select</option>
            @foreach ($bank as $key => $value)
            <option value="{{ $value->id }}">
                {{ $value->nama_bank }}
            </option>
            @endforeach
        </select>
        @error('bank_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="basicInput">No. Rekening</label>
        <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" id="basicInput"
            name="no_rekening" placeholder="Masukan No. Rekening" value="{{ old('no_rekening') }}" required />
        @error('no_rekening')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="basicInput">Penerima</label>
        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="basicInput"
            name="nama_penerima" placeholder="Masukan A/N Penerima" value="{{ old('nama_penerima') }}" required />
        @error('nama_penerima')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <input type="hidden" name="user_id" value="{{ $userId }}">
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
</form>

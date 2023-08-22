<form action="{{ route('norek.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label" for="basicInput">Nama Bank</label>
        <select class="form-select @error('bank_id') is-invalid @enderror" id="selectDefault" name="bank_id">
            <option selected>{{ $edit->bank->nama_bank }}</option>
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
        <label class="form-label" for="basicInput">No Rekening</label>
        <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" id="basicInput"
            name="no_rekening" placeholder="Enter" value="{{ $edit->no_rekening }}" required />
        @error('no_rekening')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="basicInput">Penerima</label>
        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="basicInput"
            name="nama_penerima" placeholder="Enter" value="{{ $edit->nama_penerima }}" required />
        @error('nama_penerima')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <input type="hidden" name="user_id" value="{{ $userId }}">
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
    <a href="{{ route('norek.index') }}" class="btn btn-secondary float-end ">Back</a>
</form>
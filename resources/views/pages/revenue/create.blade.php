<form action="{{ route('revenue.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Masukan Nama revenue"
            name="date" value="{{ old('date') }}" />
        @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Keterangan </label>
        <input type="text" class="form-control @error('ket') is-invalid @enderror" placeholder="Masukan Nama Ket"
            name="ket" value="{{ old('ket') }}" />
        @error('ket')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Invoice Amount</label>
        <input type="text" class="form-control @error('amount_invoice') is-invalid @enderror"
            placeholder="Masukan Nama amount_invoice" name="amount_invoice" value="{{ old('amount_invoice') }}" />
        @error('amount_invoice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
</form>

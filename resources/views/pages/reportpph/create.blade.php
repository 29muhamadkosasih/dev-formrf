@extends('layouts/master')

@section('title', 'Report PPH 23')

@section('content')
<!-- Invoice table -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Report PPH 23</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reportpph.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="multicol-country">Client</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="client" required />
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-fullname">No Invoice</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="no_invoice" required />
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-fullname">Bruto (Rp.)</label>
                        <input type="number" class="form-control @error('bruto') is-invalid @enderror"
                            id="basic-default-fullname" name="bruto" placeholder="Enter" value="{{ old('bruto') }}"
                            required />
                        @error('bruto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-email">Amount Payment In (RP.)</label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="basic-default-email" class="form-control" placeholder="Enter"
                                aria-label="Enter" aria-describedby="basic-default-email2" name="payment_in" required />
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Paid Date</label>
                        </div>
                        <input type="date" id="basic-default-email" class="form-control" placeholder="Enter"
                            aria-label="Enter" aria-describedby="basic-default-email2" name="paid_date" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">PPH 23 (Rp.)</label>
                        <input type="number" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="pph23" required />
                        @error('pph23')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">NPWP</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="npwp" />
                        @error('npwp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">Masa Pajak</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="masa_pajak" />
                        @error('masa_pajak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">No Bukpot</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="no_bukpot" />
                        @error('no_bukpot')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">Tanggal Pemotongan</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="tgl_pemotongan" />
                        @error('tgl_pemotongan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 mt-2">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('reportpph.index') }}" class="btn btn-secondary float-end ">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection
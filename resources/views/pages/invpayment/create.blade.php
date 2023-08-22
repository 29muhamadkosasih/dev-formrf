@extends('layouts/master')

@section('title', 'Invoice & Payment In')

@section('content')
<!-- Invoice table -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Invoice & Payemnt In</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('invpayment.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="multicol-country">No Project</label>
                        <input type="number" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="no_project" required autofocus />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="basic-default-fullname">PIC Client</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="pic_client" required />
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-email">No Invoice</label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="basic-default-email" class="form-control" placeholder="Enter"
                                aria-label="Enter" aria-describedby="basic-default-email2" name="no_invoice" required />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="basic-default-fullname">No PO</label>
                        <input type="text" class="form-control @error('no_po') is-invalid @enderror"
                            id="basic-default-fullname" name="no_po" placeholder="Enter" value="{{ old('no_po') }}" />
                        @error('no_po')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">Date Invoice</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="date_invoice" required />
                        @error('date_invoice')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Amount (Rp.)</label>
                        </div>
                        <input type="text" id="basic-default-email" class="form-control" placeholder="Enter"
                            aria-label="Enter" aria-describedby="basic-default-email2" name="amount_invoice" required />
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="basicInput">Due Date</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="due_date" required />
                        @error('due_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">Amount Payment In (Rp.)</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="payment_in" />
                        @error('payment_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="basicInput">Paid Date</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="paid_date" />
                        @error('paid_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('invpayment.index') }}" class="btn btn-secondary float-end ">Back</a>
            </form>

        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection
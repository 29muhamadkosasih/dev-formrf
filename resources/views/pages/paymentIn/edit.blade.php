@extends('layouts/master')

@section('title', 'Payment In')

@section('content')
<!-- Invoice table -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Payment In</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('paymentIn.update', $edit->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="no_invoice" value="{{$edit->no_invoice}}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">Client</label>
                        <input type="text" id="multicol-username"
                            class="form-control @error('client') is-invalid @enderror" placeholder="Enter" name="client"
                            required value="{{ old('client', $edit->client) }}">
                        @error('client')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Amount</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control  @error('amount') is-invalid @enderror"
                                placeholder="Enter" name="amount" value="{{ old('amount', $edit->amount) }}">
                            @error('amount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('paymentIn.index') }}" class="btn btn-secondary float-end ">Back</a>
            </form>

        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection
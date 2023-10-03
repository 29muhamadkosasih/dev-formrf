@extends('layouts/master')

@section('title', 'Invoice & Pembayaran')

@section('content')
<!-- Invoice table -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Invoice & Pembayaran</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('invpayment.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="multicol-country">No Project</label>
                        <input type="number" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="no_project" required autofocus />
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-fullname">Nama Client</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="pic_client" required />
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-email">No Invoice</label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="basic-default-email" class="form-control" placeholder="Enter"
                                aria-label="Enter" aria-describedby="basic-default-email2" name="no_invoice" required />
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-2">
                        <label class="form-label" for="basic-default-fullname">No PO</label>
                        <input type="text" class="form-control @error('no_po') is-invalid @enderror"
                            id="basic-default-fullname" name="no_po" placeholder="Enter" value="{{ old('no_po') }}" />
                        @error('no_po')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Tanggal Invoice</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="date_invoice" required />
                        @error('date_invoice')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Nominal Invoice (Rp.)</label>
                        </div>
                        <input type="text" id="tanpa-rupiah" class="form-control" placeholder="Enter" aria-label="Enter"
                            aria-describedby="basic-default-email2" name="amount_invoice" required />
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Jatuh Tempo</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="due_date" required />
                        @error('due_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Nominal Penerimaan (Rp.)</label>
                        <input type="text" class="form-control" id="tanpa-rupiah2" placeholder="Enter"
                            name="payment_in" />
                        @error('payment_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Tanggal Penerimaan</label>
                        <input type="date" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="paid_date" />
                        @error('paid_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-3">
                    {{-- <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Potongan PPH 23</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="deduction" />
                        @error('deduction')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Pot PPH 23 (Rp.)</label>
                        <input type="text" class="form-control" id="tanpa-rupiah3" placeholder="Enter"
                            name="deduction" />
                        @error('deduction')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="basicInput">Keterangan</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter"
                            name="ket" />
                        @error('ket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('invpayment.index') }}" class="btn btn-secondary float-end ">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function (e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function (e) {
        tanpa_rupiah2.value = formatRupiah2(this.value);
    });

    /* Fungsi */
    function formatRupiah2(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah3 = document.getElementById('tanpa-rupiah3');
    tanpa_rupiah3.addEventListener('keyup', function (e) {
    tanpa_rupiah3.value = formatRupiah3(this.value);
    });

    /* Fungsi */
    function formatRupiah3(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<!-- /Invoice table -->
@endsection

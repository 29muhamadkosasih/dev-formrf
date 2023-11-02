@extends('layouts/master')
@section('title', 'Resume')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            @php
            // Ambil tanggal dari model Resume
            $tgl = $edit->tgl_resume;
            // Mendapatkan hari dari tanggal
            $dayOfMonth = Carbon\Carbon::parse($tgl)->day;
            @endphp

            <h5 class="fs-5 text-center">{{ \Carbon\Carbon::parse($edit->tgl_resume)->translatedFormat('l, j F Y')
                }}
                <br>
                @unless($dayOfMonth == 1)
                <i>Kemarin</i>
                <br>
                {{ \Carbon\Carbon::parse($tanggalKemarinYESR)->translatedFormat('l, j F Y') }}
                @endunless
            </h5>

            <form method="POST" action="{{ route('resume.store.pre-view', $edit->id) }}">
                @method('PUT')
                @csrf
                <h5 class="fs-5">Cash & Bank</h5>
                <div class="row g-4 ">
                    <div class="col-md-3">
                        <label class="form-label">Petty Cash</label>
                        <input id="tanpa-rupiah" class="form-control" type="text" placeholder="Enter"
                            name="cb_petty_cash" autofocus>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Petty Cash Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_petty_cash, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_petty_cash_kemarin" value="{{ $dataKemarin_cb_petty_cash }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Bank Mandiri 7899 - Opr</label>
                        <input id="tanpa-rupiah2" class="form-control" type="text" placeholder="Enter"
                            name="cb_mandiri_opr">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Bank Mandiri 7899 - Opr Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_mandiri_opr, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_mandiri_opr_kemarin" value="{{ $dataKemarin_cb_mandiri_opr }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Bank Mandiri 7893 - Giro</label>
                        <input id="tanpa-rupiah8" class="form-control" type="text" placeholder="Enter"
                            name="cb_mandiri_giro">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Bank Mandiri 7893 - Giro Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_mandiri_giro, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_mandiri_giro_kemarin" value="{{ $dataKemarin_cb_mandiri_giro }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Bank Mandiri 7894 - LSP</label>
                        <input id="tanpa-rupiah4" class="form-control" type="text" placeholder="Enter"
                            name="cb_mandiri_lsp">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Bank Mandiri 7894 - LSP Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_mandiri_lsp, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_mandiri_lsp_kemarin" value="{{ $dataKemarin_cb_mandiri_lsp }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Bank Mandiri 1176 - Batam</label>
                        <input id="tanpa-rupiah5" class="form-control" type="text" placeholder="Enter"
                            name="cb_mandiri_batam">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Bank Mandiri 1176 - Batam Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_mandiri_batam, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_mandiri_batam_kemarin"
                            value="{{ $dataKemarin_cb_mandiri_batam }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Bank Mandiri 7897 - Cadangan</label>
                        <input id="tanpa-rupiah6" class="form-control" type="text" placeholder="Enter"
                            name="cb_mandiri_cadangan">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total Bank Mandiri 7897 - Cadangan Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_cb_mandiri_cadangan, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="cb_mandiri_cadangan_kemarin"
                            value="{{ $dataKemarin_cb_mandiri_cadangan }}">
                    </div>
                </div>
                <br>
                <hr>
                <h5 class="fs-5 mt-3">Revenue & Sales</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label"> Revenue / Sales</label>
                        <input id="tanpa-rupiah7" class="form-control" type="text" placeholder="Enter"
                            name="rs_total_today">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label mb-2"> Total Revenue / Sales Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin2, 2, ',', '.')?? 0 }}</h5>
                    </div>
                </div>
                <br>
                <hr>
                <h5 class="fs-5 mt-3">Sales Outstanding / Piutang</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label mb-2"> Total Outstanding Kemarin</label>
                        <h5>Rp. {{ number_format($so_outstanding_kemarin, 2, ',', '.')?? 0 }}</h5>
                        <input type="hidden" name="so_outstanding_kemarin" value="{{ $so_outstanding_kemarin }}">
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Outstanding</label>
                        <input id="tanpa-rupiah14" class="form-control" type="text" placeholder="Enter"
                            name="so_outstanding">
                    </div> --}}
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Adjusment Invoice</label>
                        <input id="tanpa-rupiah92" class="form-control" type="text" placeholder="Enter"
                            name="so_adjusment_invoice">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Outstanding Today (Invoice Out)</label>
                        <input id="tanpa-rupiah93" class="form-control" type="text" placeholder="Enter"
                            name="so_invoice_out">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Prepaid Tax Art 23</label>
                        <input id="tanpa-rupiah94" class="form-control" type="text" placeholder="Enter"
                            name="so_prepaid_tax">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Paid Today</label>
                        <input id="tanpa-rupiah95" class="form-control" type="text" placeholder="Enter"
                            name="so_paid_today">
                    </div>
                </div>
                <br>
                <hr>
                <h5 class="fs-5 mt-3">Overbooking / Pindah Buku</h5>
                <div class="row g-4">
                    <div class="col-md-3">
                        <label class="form-label">899 TO 893</label>
                        <input id="tanpa-rupiah12" class="form-control" type="text" placeholder="Enter"
                            name="pb_899_893">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total 899 TO 893 Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_899_to_893, 2, ',', '.')?? 0 }}</h5>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">893 TO 899</label>
                        <input id="tanpa-rupiah13" class="form-control" type="text" placeholder="Enter"
                            name="pb_893_899">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total 893 TO 899 Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_893_to_899, 2, ',', '.')?? 0 }}</h5>
                    </div>
                </div>
                <br>
                <hr>
                <h5 class="fs-5 mt-3">Arus Kas</h5>
                <div class="row g-4">
                    <div class="col-md-3">
                        <label for="defaultInput" class="form-label">Total arus kas masuk</label>
                        <input id="tanpa-rupiah10" class="form-control" type="text" placeholder="Enter" name="ak_masuk">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total arus kas masuk Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_masuk, 2, ',', '.')?? 0 }}</h5>
                    </div>
                    <div class="col-md-3">
                        <label for="defaultInput" class="form-label">Total arus kas keluar</label>
                        <input id="tanpa-rupiah11" class="form-control" type="text" placeholder="Enter"
                            name="ak_keluar">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label mb-2"> Total arus kas keluar Kemarin</label>
                        <h5>Rp. {{ number_format($dataKemarin_keluar, 2, ',', '.')?? 0 }}</h5>
                    </div>
                </div>
                <br>
                <hr>

                {{-- <br>
                <hr>
                <h5 class="fs-5 mt-3">Resume</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Cash and bank</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter" name="">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Overbooking 899 to 893</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Overbooking 893 to 899</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Total overbooking</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Revenue and sales</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Expenses</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Outstanding</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Profit / Loss</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                </div>
                <br>
                <hr> --}}

                <h5 class="fs-5 mt-3">Rasio</h5>
                <div class="row g-4">
                    {{-- <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Cash and bank</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Outstanding</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Total</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div> --}}
                    <div class="col-md-4">
                        <label class="form-label">Total a/e revenue</label>
                        <input id="tanpa-rupiah91" class="form-control" type="text" placeholder="Enter"
                            name="rasio_total_revenue">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Total account payable</label>
                        <input id="tanpa-rupiah90" class="form-control" type="text" placeholder="Enter"
                            name="rasio_account_payable">
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Rasio</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Rasio until 6th month</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div>
                    <div class="col-md-4">
                        <label for="defaultInput" class="form-label">Rasio bulan berdasarkan rata-rata expense
                            (750.000.000/bulan)</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Enter">
                    </div> --}}
                </div>
                <input type="hidden" name="tgl_resume" value="{{ $edit->tgl_resume }}">
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary float-end ms-2">Submit</button>
                    <a href="{{ route('resume.index') }}" class="btn btn-secondary float-end ">Back</a>
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

    /* Tanpa Rupiah */
    var tanpa_rupiah90 = document.getElementById('tanpa-rupiah90');
    tanpa_rupiah90.addEventListener('keyup', function (e) {
        tanpa_rupiah90.value = formatRupiah90(this.value);
    });

    /* Fungsi */
    function formatRupiah90(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah91 = document.getElementById('tanpa-rupiah91');
    tanpa_rupiah91.addEventListener('keyup', function (e) {
        tanpa_rupiah91.value = formatRupiah91(this.value);
    });

    /* Fungsi */
    function formatRupiah91(angka, prefix) {
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

    /* Tanpa Rupiah */
    var tanpa_rupiah92 = document.getElementById('tanpa-rupiah92');
    tanpa_rupiah92.addEventListener('keyup', function (e) {
        tanpa_rupiah92.value = formatRupiah92(this.value);
    });

    /* Fungsi */
    function formatRupiah92(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah93 = document.getElementById('tanpa-rupiah93');
    tanpa_rupiah93.addEventListener('keyup', function (e) {
        tanpa_rupiah93.value = formatRupiah93(this.value);
    });

    /* Fungsi */
    function formatRupiah93(angka, prefix) {
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
    /* Tanpa Rupiah */
    var tanpa_rupiah94 = document.getElementById('tanpa-rupiah94');
    tanpa_rupiah94.addEventListener('keyup', function (e) {
        tanpa_rupiah94.value = formatRupiah94(this.value);
    });

    /* Fungsi */
    function formatRupiah94(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah95 = document.getElementById('tanpa-rupiah95');
    tanpa_rupiah95.addEventListener('keyup', function (e) {
        tanpa_rupiah95.value = formatRupiah95(this.value);
    });

    /* Fungsi */
    function formatRupiah95(angka, prefix) {
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

     /* Tanpa Rupiah */
    var tanpa_rupiah10 = document.getElementById('tanpa-rupiah10');
    tanpa_rupiah10.addEventListener('keyup', function (e) {
        tanpa_rupiah10.value = formatRupiah10(this.value);
    });

    /* Fungsi */
    function formatRupiah10(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah11 = document.getElementById('tanpa-rupiah11');
    tanpa_rupiah11.addEventListener('keyup', function (e) {
        tanpa_rupiah11.value = formatRupiah11(this.value);
    });

    /* Fungsi */
    function formatRupiah11(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah12 = document.getElementById('tanpa-rupiah12');
    tanpa_rupiah12.addEventListener('keyup', function (e) {
        tanpa_rupiah12.value = formatRupiah12(this.value);
    });

    /* Fungsi */
    function formatRupiah12(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah13 = document.getElementById('tanpa-rupiah13');
    tanpa_rupiah13.addEventListener('keyup', function (e) {
        tanpa_rupiah13.value = formatRupiah13(this.value);
    });

    /* Fungsi */
    function formatRupiah13(angka, prefix) {
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
    }    /* Tanpa Rupiah */
    var tanpa_rupiah14 = document.getElementById('tanpa-rupiah14');
    tanpa_rupiah14.addEventListener('keyup', function (e) {
        tanpa_rupiah14.value = formatRupiah14(this.value);
    });

    /* Fungsi */
    function formatRupiah14(angka, prefix) {
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

    /* Tanpa Rupiah */
    var tanpa_rupiah15 = document.getElementById('tanpa-rupiah15');
    tanpa_rupiah15.addEventListener('keyup', function (e) {
        tanpa_rupiah15.value = formatRupiah15(this.value);
    });

    /* Fungsi */
    function formatRupiah15(angka, prefix) {
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

    /* Tanpa Rupiah */
    var tanpa_rupiah16 = document.getElementById('tanpa-rupiah16');
    tanpa_rupiah16.addEventListener('keyup', function (e) {
        tanpa_rupiah16.value = formatRupiah16(this.value);
    });

    /* Fungsi */
    function formatRupiah16(angka, prefix) {
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

    /* Tanpa Rupiah */
    var tanpa_rupiah17 = document.getElementById('tanpa-rupiah17');
    tanpa_rupiah17.addEventListener('keyup', function (e) {
        tanpa_rupiah17.value = formatRupiah17(this.value);
    });

    /* Fungsi */
    function formatRupiah17(angka, prefix) {
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

    /* Tanpa Rupiah */
    var tanpa_rupiah18 = document.getElementById('tanpa-rupiah18');
    tanpa_rupiah18.addEventListener('keyup', function (e) {
        tanpa_rupiah18.value = formatRupiah18(this.value);
    });

    /* Fungsi */
    function formatRupiah18(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah19 = document.getElementById('tanpa-rupiah19');
    tanpa_rupiah19.addEventListener('keyup', function (e) {
        tanpa_rupiah19.value = formatRupiah19(this.value);
    });

    /* Fungsi */
    function formatRupiah19(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah20 = document.getElementById('tanpa-rupiah20');
    tanpa_rupiah20.addEventListener('keyup', function (e) {
        tanpa_rupiah20.value = formatRupiah20(this.value);
    });

    /* Fungsi */
    function formatRupiah20(angka, prefix) {
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


    /* Tanpa Rupiah */
    var tanpa_rupiah21 = document.getElementById('tanpa-rupiah21');
    tanpa_rupiah21.addEventListener('keyup', function (e) {
        tanpa_rupiah21.value = formatRupiah21(this.value);
    });

    /* Fungsi */
    function formatRupiah21(angka, prefix) {
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

        var tanpa_rupiah100 = document.getElementById('tanpa-rupiah100');
        tanpa_rupiah100.addEventListener('keyup', function (e) {
            tanpa_rupiah100.value = formatRupiah100(this.value);
        });

        /* Fungsi */
        function formatRupiah100(angka, prefix) {
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


        var tanpa_rupiah101 = document.getElementById('tanpa-rupiah101');
        tanpa_rupiah101.addEventListener('keyup', function (e) {
            tanpa_rupiah101.value = formatRupiah101(this.value);
        });

        /* Fungsi */
        function formatRupiah101(angka, prefix) {
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



        var tanpa_rupiah102 = document.getElementById('tanpa-rupiah102');
        tanpa_rupiah102.addEventListener('keyup', function (e) {
            tanpa_rupiah102.value = formatRupiah102(this.value);
        });

        /* Fungsi */
        function formatRupiah102(angka, prefix) {
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



        var tanpa_rupiah103 = document.getElementById('tanpa-rupiah103');
        tanpa_rupiah103.addEventListener('keyup', function (e) {
            tanpa_rupiah103.value = formatRupiah103(this.value);
        });

        /* Fungsi */
        function formatRupiah103(angka, prefix) {
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



        var tanpa_rupiah104 = document.getElementById('tanpa-rupiah104');
        tanpa_rupiah104.addEventListener('keyup', function (e) {
            tanpa_rupiah104.value = formatRupiah104(this.value);
        });

        /* Fungsi */
        function formatRupiah104(angka, prefix) {
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


        var tanpa_rupiah105 = document.getElementById('tanpa-rupiah105');
        tanpa_rupiah105.addEventListener('keyup', function (e) {
            tanpa_rupiah105.value = formatRupiah105(this.value);
        });

        /* Fungsi */
        function formatRupiah105(angka, prefix) {
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

        var tanpa_rupiah106 = document.getElementById('tanpa-rupiah106');
        tanpa_rupiah106.addEventListener('keyup', function (e) {
            tanpa_rupiah106.value = formatRupiah106(this.value);
        });

        /* Fungsi */
        function formatRupiah106(angka, prefix) {
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

<script>
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

        var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
        tanpa_rupiah4.addEventListener('keyup', function (e) {
            tanpa_rupiah4.value = formatRupiah4(this.value);
        });

        /* Fungsi */
        function formatRupiah4(angka, prefix) {
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

        var tanpa_rupiah5 = document.getElementById('tanpa-rupiah5');
        tanpa_rupiah5.addEventListener('keyup', function (e) {
            tanpa_rupiah5.value = formatRupiah5(this.value);
        });

        /* Fungsi */
        function formatRupiah5(angka, prefix) {
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
        var tanpa_rupiah6 = document.getElementById('tanpa-rupiah6');
        tanpa_rupiah6.addEventListener('keyup', function (e) {
            tanpa_rupiah6.value = formatRupiah6(this.value);
        });

        /* Fungsi */
        function formatRupiah6(angka, prefix) {
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
        var tanpa_rupiah7 = document.getElementById('tanpa-rupiah7');
        tanpa_rupiah7.addEventListener('keyup', function (e) {
            tanpa_rupiah7.value = formatRupiah7(this.value);
        });

        /* Fungsi */
        function formatRupiah7(angka, prefix) {
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
        var tanpa_rupiah8 = document.getElementById('tanpa-rupiah8');
        tanpa_rupiah8.addEventListener('keyup', function (e) {
            tanpa_rupiah8.value = formatRupiah8(this.value);
        });

        /* Fungsi */
        function formatRupiah8(angka, prefix) {
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

        $(document).ready(function () {
            // Format mata uang.
            $('#uang').mask('000.000.000', {
                reverse: true
            });
        })

</script>
@endsection
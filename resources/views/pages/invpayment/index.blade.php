@extends('layouts/master')
@section('title', 'Invoice & Pembayaran')
@section('content')
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">{{ $total_inv }}</h5>
                        <small>Total Jumlah INV</small> <b>Tahun {{ $currentYears }}</b>
                    </div>
                    <a href="{{ route('invpayment-resume.index') }}">

                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-receipt ti-sm"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">Rp. {{ number_format($amount_inv, 0, ',', '.',)
                            }}</h5>
                        <small>Total Amount INV</small> <b>Tahun {{ $currentYears }}</b>
                    </div>
                    <a href="{{ route('invpayment-resume.index') }}">
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-report-money ti-sm"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">Rp. {{ number_format($penerimaan, 0, ',', '.',)
                            }}</h5>
                        <small>Nominal Penerimaan</small> <b>Tahun {{ $currentYears }}</b>
                    </div>
                    <a href="{{ route('invpayment-resume.index') }}">
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded-pill p-2">
                                <i class="ti ti-align-box-bottom-center ti-sm"></i>
                            </span>
                        </div>
                    </a>

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">Rp. {{ number_format($pph, 0, ',', '.',)
                            }}</h5>
                        <small>Total POT. PPH 23</small> <b>Tahun {{ $currentYears }}</b>
                    </div>
                    <a href="{{ route('invpayment-resume.index') }}">
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded-pill p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">Rp. {{ number_format($os, 0, ',', '.',)
                            }}</h5>
                        <small>Out Standing</small> <b>Tahun {{ $currentYears }}</b>
                    </div>
                    <a href="{{ route('invpayment-resume.index') }}">
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded-pill p-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 ">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Invoice & Pembayaran</h5>
                </div>
                <div class="col-auto mt-1">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Filter
                    </button>

                    <a href="{{ route('invpayment.create') }}" class="btn btn-primary me-2">Create</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='5' style="text-align: center">No</th>
                            <th width='50px' class="text-center">No <br> Project</th>
                            <th width='50px' class="text-center">Nama Client</th>
                            <th width='50px' class="text-center">No Inv</th>
                            {{-- <th class="text-center">No PO</th> --}}
                            <th width='50px' class="text-center">Tanggal <br> Inv</th>
                            <th width='50px' class="text-center">Nominal <br> Inv (Rp.)</th>
                            <th width='50px' class="text-center">Jatuh <br> Tempo </th>
                            <th width='50px' class="text-center">Nominal <br> Penerimaan <br> (Rp.)</th>
                            <th width='50px' class="text-center">Tanggal <br> Penerimaan</th>
                            <th width='50px' class="text-center">Pot. <br> PPH 23</th>
                            <th width='50px' class="text-center">Ket</th>
                            <th width='50px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($invpayment as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td width='50px'>
                                @switch($user)
                                @case($user->no_project == null)
                                @break
                                @default
                                {{$user->no_project}}
                                @endswitch

                            </td>
                            <td width='50px'>

                                @switch($user)
                                @case($user->pic_client == null)
                                @break
                                @default
                                {{$user->pic_client}}
                                @endswitch
                            </td>
                            <td width='50px'>

                                @switch($user)
                                @case($user->no_invoice == null)
                                @break
                                @default
                                {{$user->no_invoice}}
                                @endswitch
                            </td>
                            {{-- <td>

                                @switch($user)
                                @case($user->no_po == null)
                                @break
                                @default
                                {{$user->no_po}}
                                @endswitch

                            </td> --}}
                            <td width='50px'>
                                @switch($user)
                                @case($user->date_invoice == null)
                                @break
                                @default
                                {{-- {{$user->date_invoice}} --}}

                                {{ \Carbon\Carbon::parse($user->date_invoice)->format('d-m-Y') }}

                                @endswitch

                            </td>
                            <td width='50px' style="text-align: right">

                                @switch($user)
                                @case($user->amount_invoice == null)
                                @break
                                @default
                                {{ number_format($user->amount_invoice, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td width='50px'>

                                @switch($user)
                                @case($user->due_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->due_date)->format('d-m-Y') }}
                                @endswitch
                            </td>
                            <td width='50px' style="text-align: right">

                                @switch($user)
                                @case($user->payment_in == null)
                                @break
                                @default
                                {{ number_format($user->payment_in, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td width='50px'>
                                @switch($user)
                                @case($user->paid_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->paid_date)->format('d-m-Y') }}

                                @endswitch
                            </td>
                            <td width='50px' style="text-align: right">
                                @switch($user)
                                @case($user->deduction == null)
                                @break
                                @default
                                {{ number_format($user->deduction, 0, ',', '.') }}
                                @endswitch
                            </td>
                            <td width='50px'>
                                @switch($user)
                                @case($user->ket == null)
                                @break
                                @default
                                {{ $user->ket }}
                                @endswitch
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('invpayment.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('invpayment.edit', $user->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr style="color:black; background-color: lightgreen">
                        <th colspan="5" style="text-align: right"><b>TOTAL</b></th>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_a, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td colspan="" style="text-align: right">
                            {{ number_format($jumlah_b, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_c, 0, ',', '.') }}
                        </td>
                        <td colspan="" style="text-align: right"></td>
                        <td colspan="" style="text-align: right"></td>
                    </tr>
                    @foreach ($latestData as $item)
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">OS Sampai Kemaren </td>
                        <td style="color:black; background-color:rgb(228, 228, 80);text-align :right">{{
                            number_format($item->os_sampai_kemarin, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Penyesuaian Invoice </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pe_invoice, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">OS Hari Ini </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->os_hari_ini, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Potongan </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pot, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Pembayaran Hari Ini </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pem_hari_ini, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">ABC - Total OS </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">os</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('laporan.getLaporan.InvPayment') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Report Data Invoice & Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-2">
                            <label for="emailWithTitle" class="form-label">Start Date</label>
                            <input type="text" name="from" class="form-control" placeholder="Start Date"
                                onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="col mb-2">
                            <label for="dobWithTitle" class="form-label">End Date</label>
                            <input type="text" name="to" class="form-control" placeholder="End Date"
                                onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <label for="nameWithTitle" class="form-label">Kategori</label>
                            <select class="form-select" id="selectDefault" name="kat" required>
                                <option selected>Open this select</option>
                                <option value="date_invoice">TGL INV</option>
                                <option value="due_date">TGL JATUH TEMPO</option>
                                <option value="paid_date">TGL PENERIMAAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Cari Data</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

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

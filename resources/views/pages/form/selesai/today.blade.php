@extends('layouts/master')
@section('content')
@section('title', 'Resume RF')
<div class="col-12 col-xl-9 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">{{ \Carbon\Carbon::parse($currentDate)->translatedFormat('l, j F Y') }}
                </div>
                <div class="col-auto">
                    <a href="{{ url('form-list/print') }}" class="btn btn-primary btn-sm" target="_blank"><i
                            class="menu-icon tf-icons ti ti-download"></i>PDF</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" style="border: 1px solid black">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>No. RF</th>
                            <th>Dari</th>
                            <th>Payment <br> Method</th>
                            <th>Bank</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($form as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->no_rf }}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>

                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->payment == 'Transfer')
                                {{ $data->norek->bank->nama_bank }}
                                @break
                                @default
                                <span class="badge bg-info">
                                    <i data-feather='dollar-sign'></i>
                                    Cash
                                </span>
                                @endswitch
                            </td>

                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td style="text-align :right ">
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="6" style="text-align :right ">TOTAL CASH</th>
                            <td style="text-align :right"> {{ number_format($jumlah_total, 0, ',',
                                '.') }}</td>
                        </tr>

                        @forelse ($form2 as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->no_rf }}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>

                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->norek->bank->nama_bank }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td style="text-align :right ">
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="6" style="text-align :right ">TOTAL TRANSFER </th>
                            <td style="text-align :right"> {{ number_format($jumlah_total2, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="6" style="text-align :right ">TOTAL BIAYA TRANSFER </th>
                            <td style="text-align :right"> {{ number_format($jumlah_admin, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="6" style="text-align :right ">JUMLAH TOTAL </th>
                            <td style="text-align :right"> {{ number_format($jumlah_akhir, 0, ',',
                                '.') }}</td>
                        </tr>
                        @foreach ($latestData as $item)
                        <tr style="color:black; background-color: #FF5733">
                            <th colspan="6" style="text-align :right ">JUMLAH TOTAL SALDO 899 </th>

                            <td style="text-align :right">{{ number_format($item->jumlah_saldo_899, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: #FF5733">
                            <th colspan="6" style="text-align :right ">JUMLAH TOTAL SALDO 893 </th>

                            <td style="text-align :right">{{ number_format($item->jumlah_saldo_893, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: #FF5733">
                            <th colspan="6" style="text-align :right ">JUMLAH TOTAL PETTY CASH </th>

                            <td style="text-align :right">{{ number_format($item->p_cash, 0, ',',
                                '.') }}</td>
                        </tr>
                        @endforeach

                        @foreach ($latestData2 as $item)
                        <tr style="color:black; background-color: #EEE600">
                            <th colspan="6" style="text-align :right ">Jumlah Penarikan Uang Kas </th>

                            <td style="text-align :right">{{ number_format($item->p_uang_kas, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: #EEE600">
                            <th colspan="6" style="text-align :right "> Jumlah PB 899-893 </th>

                            <td style="text-align :right">{{ number_format($item->a_b, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: #EEE600">
                            <th colspan="6" style="text-align :right "> Jumlah PB 893-899 </th>

                            <td style="text-align :right">{{ number_format($item->b_a, 0, ',',
                                '.') }}</td>
                        </tr>
                        @endforeach

                        @foreach ($latestData3 as $item)
                        <tr style="color:black; background-color: skyblue">
                            <th colspan="6" style="text-align :right ">Jumlah Pengajuan </th>

                            <td style="text-align :right">{{ number_format($item->jumlah, 0, ',',
                                '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Projects table -->
<!-- Source Visit -->
<div class="col-xl-3 col-md-6 order-2 order-lg-1">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Total Pengajuan</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tpengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    {{-- <label class="form-label"></label> --}}
                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Pengajuan" id="tanpa-rupiah" name="jumlah" />
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2 mb-2 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Informasi Saldo</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('saldoStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Saldo 899</label>
                    <input type="text" class="form-control @error('jumlah_saldo_899') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo 899" id="tanpa-rupiah2" name="jumlah_saldo_899" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Saldo 893</label>
                    <input type="text" class="form-control @error('jumlah_saldo_893') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo 899" id="tanpa-rupiah4" name="jumlah_saldo_893" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Saldo Petty Cash</label>
                    <input type="text" class="form-control @error('b_a') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo Petty Cash" id="tanpa-rupiah5" name="p_cash" />
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2 mb-2 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Laporan Pindah Buku dan Penarikan Uang Kas</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('reportPB.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Penarikan Uang Kas</label>
                    <input type="text" class="form-control @error('p_uang_kas') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Kas" id="tanpa-rupiah8" name="p_uang_kas" />
                </div>
                <div class="mb-3">
                    <label class="form-label">PB 899-893</label>
                    <input type="text" class="form-control @error('a_b') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo" id="tanpa-rupiah6" name="a_b" />
                </div>
                <div class="mb-3">
                    <label class="form-label">PB 893-899</label>
                    <input type="text" class="form-control @error('b_a') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo" id="tanpa-rupiah7" name="b_a" />
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2 mb-2 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/ Source Visit -->

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

        $(document).ready(function(){
            // Format mata uang.
            $( '#uang' ).mask('000.000.000', {reverse: true});
        })

</script>
@endsection

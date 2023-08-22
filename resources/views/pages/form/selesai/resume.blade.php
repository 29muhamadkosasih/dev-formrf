@extends('layouts/master')
@section('content')

@section('title', 'Form')

<!-- Invoice table -->

<div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Report Data Pengajuan
                </div>
            </div>
            <form action="{{ route('laporan.getLaporan') }}" method="POST">
                @csrf
                <label for="from" class="mb-2">Start Date</label><br>
                <input type="text" name="from" class="form-control mb-2" placeholder="Start Date"
                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                <label for="to" class="mb-2">End Date</label><br>
                <input type="text" name="to" class="form-control mb-3" placeholder="End Date"
                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                <button type="submit" class="btn btn-primary mb-0" style="align-items: right">Cari Data</button>
            </form>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-bordered">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Tanggal</th>
                            <th>Dari</th>
                            <th>Payment Method</th>
                            <th>Kategori
                                Pengajuan</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>

                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td style="text-align :right ">
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                        </tr>
                        @endforeach
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="5" style="text-align :right ">TOTAL</th>
                            <td style="text-align :right"> {{ number_format($jumlah_total, 0, ',',
                                '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection

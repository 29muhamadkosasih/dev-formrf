@extends('layouts/master')
@section('content')
@section('title', 'Report PB')

<!-- Invoice table -->

<div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Filter Data Report PB dan dan Penarikan Uang Kas
                </div>
            </div>
            <form action="{{ route('laporan.getLaporan.reportPB') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-5 mb-2">
                        <label for="from" class="mb-2">Start Date</label><br> <input type="text" name="from"
                            class="form-control mb-0" placeholder="Start Date" onfocusin="(this.type='date')"
                            onfocusout="(this.type='text')">
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="to" class="mb-2">End Date</label><br>
                        <input type="text" name="to" class="form-control mb-0" placeholder="End Date"
                            onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="to" class="mb-2"></label><br>
                        <button type="submit" class="btn btn-primary float-end mt-2">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Report PB dan dan Penarikan Uang Kas
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">899-893 (RP)</th>
                            <th style="text-align: center">893-899 (RP)</th>
                            <th style="text-align: center">Penarikan Uang Kas (RP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y') }}
                            </td>
                            <td style="text-align :right">
                                {{ number_format($data->a_b, 0, ',', '.') }}
                            </td>
                            <td style="text-align :right">
                                {{ number_format($data->b_a, 0, ',', '.') }}
                            </td>
                            <td style="text-align :right">
                                {{ number_format($data->p_uang_kas, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr style="background-color: skyblue">
                        <td colspan="2" style="text-align: right">TOTAL</td>
                        <td style="text-align: right">{{ number_format($jumlah_a, 0, ',', '.') }}</td>
                        <td style="text-align: right">{{ number_format($jumlah_b, 0, ',', '.') }}</td>
                        <td style="text-align: right">{{ number_format($p_uang_kas, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection
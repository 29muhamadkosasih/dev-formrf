@extends('layouts.master')

@section('content')
@section('title', 'Dashboard')
{{-- <div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('laporan.getLaporan.InvPayment') }}" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="col-md-8 mb-2">
                        <input type="text" name="from" class="form-control mb-0" placeholder="Masukkan Keyword ">
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="submit" class="btn btn-primary float-end">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

@if (auth()->user()->departement_id == 1)

<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $report_tdp_marketing }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports_tdp_marketing }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total_tdp_marketing, 0, ',', '.',)
                                    }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total_bulan_tdp_marketing, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form_tdp_marketing as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                                <a href=" {{ route('form.showDetailCek', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->departement_id == 2)

<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $report_tdp_admin }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports_tdp_admin }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total_tdp_admin, 0, ',', '.',)
                                    }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total_bulan_tdp_admin, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form_tdp_admin as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->departement_id == 3)
<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $report_tdp_op }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports_tdp_op }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total_tdp_op, 0, ',', '.',)
                                    }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total_bulan_tdp_op, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form_tdp_op as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->departement_id == 18)
<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $report_tkki }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports_tkki }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total_tkki, 0, ',', '.',)
                                    }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total_bulan_tkki, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form_tkki as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->departement_id == 7)
<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $report_tdp_hr }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports_tdp_hr }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total_tdp_hr, 0, ',', '.',)
                                    }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total_bulan_tdp_hr, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form_tdp_hr as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@else

<div class="col-xl-4 col-12">
    <div class="row">
        <!-- Expenses -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Total RF</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">{{ $reports }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expenses -->

        <!-- Profit last month -->
        <div class="col-xl-6 mb-4 col-md-3 col-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0">RF Perbulan</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">
                            {{ $reports }} / {{ $namaBulan }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Profit last month -->

        <!-- Generated Leads -->
        <div class="col-xl-12 mb-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">{{ number_format($jumlah_total, 0, ',', '.',) }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 mb-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Total RF Perbulan</h5>
                                <small></small>
                            </div>
                            <div class="chart-statistics">
                                <h3 class="card-title mb-1">Rp.
                                    {{ number_format($jumlah_total, 0, ',', '.',) }} /
                                    {{
                                    $namaBulan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Generated Leads -->
    </div>
</div>

<div class="col-lg-8 col-12">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 card-title">Total Pengajuan Perbulan</h5>

                </div>
                <div class="card-body mb-2"><canvas id="myAreaChart" width="100%" height="75"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 card-title">Total Pengajuan Perbulan</h5>
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="75"></canvas></div>
            </div>
        </div>
    </div>
</div>
<!--/ Revenue Report -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->to }}
                            </td>
                            <td>
                                {{ $data->ketegori_pengajuan }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var _ydata=JSON.parse('{!! json_encode($months) !!}');
	var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
</script>
@endsection
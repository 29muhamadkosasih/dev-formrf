@extends('layouts/master')
@section('content')

@section('title', 'Form')


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
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
                <div class="col-auto">
                    <a href="{{ url('pegawai/cetak_pdf') }}" class="btn btn-primary btn-sm" target="_blank"><i
                            class="menu-icon tf-icons ti ti-download"></i>PDF</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Tanggal</th>
                            <th>No. RF</th>
                            <th>Dari</th>
                            <th>Departement</th>
                            <th>Payment Method</th>
                            <th>Kategori
                                Pengajuan</th>
                            <th>Jumlah (Rp)</th>
                            <th>Nama Bank </th>
                            <th>No Rekening </th>
                            <th>Penerima </th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
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
                                {{ $data->no_rf }}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->norek_id == null)
                                <span class="badge bg-info">
                                    <i data-feather='dollar-sign'></i>
                                    Cash
                                </span>
                                @break
                                @default
                                {{ $data->norek->bank->nama_bank }}
                                @endswitch
                            </td>
                            <td>
                                @switch($data)
                                @case($data->norek_id == null)
                                <span class="badge bg-info">
                                    <i data-feather='dollar-sign'></i>
                                    Cash
                                </span>
                                @break
                                @default
                                {{ $data->norek->no_rekening }} @endswitch
                            </td>
                            <td>
                                @switch($data)
                                @case($data->norek_id == null)
                                <span class=" badge bg-info">
                                    <i data-feather='dollar-sign'></i>
                                    Cash
                                </span>
                                @break
                                @default
                                {{ $data->norek->nama_penerima }}
                                @endswitch
                            </td>
                            <td class="text-center">
                                @switch($data)
                                @case($data->status == null)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 4)
                                <a href="{{ route('form-approve.view', $data->id) }}"
                                    class="btn btn-icon btn-success btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-secondary">Menunggu Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Menunggu Konfirmasi Pembayaran</span>
                                @break
                                @case($data->status == 7)
                                <a href="{{ route('form-approve.viewDetail', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                                <a href="{{ url('approve/paid', $data->id) }}" class="btn btn-icon btn-success btn-sm">
                                    <span class="ti ti-check"></span>
                                </a>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td class="text-center">
                                <a href="{{ route('form-approve.viewDetailShow', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                    data-bs-original-title="Show Detail">
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
<!-- /Invoice table -->
@endsection
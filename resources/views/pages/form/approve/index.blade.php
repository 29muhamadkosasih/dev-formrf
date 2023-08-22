@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal Kebutuhan</th>
                            <th>Untuk</th>
                            <th>Departement</th>
                            <th>Kategori
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='180px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($form as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->rujukan->name }} </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-success"> RF Telah Approve</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-warning"> Menunggu Konfimasi Pembayaran</span>
                                @break

                                @case($data->status == 6)
                                <span class="badge bg-success">Selesai</span>
                                @break

                                @default
                                <span class="badge bg-info">Process</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">
                                @switch($data)
                                @case($data->status == 4)
                                <span class="badge bg-success"> Menunggu Konfirmasi </span>
                                @break

                                @case($data->status == 5)
                                <span class="badge bg-success"> Menunggu Konfimasi Pembayaran</span>
                                @break

                                @case($data->status == 6)
                                <a href="{{ route('form-approve.viewDetail', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                                @break

                                @default
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('form-approve.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('form-approve.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Detail">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    {{-- <a href="{{ route('form-approve.view', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm">
                                        <span class="ti ti-check"></span>
                                    </a> --}}

                                    <a href="{{ route('form-approve.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>

                                    <a href="{{ url('reject/reject', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checked.approve') --}}
                                    <a href="{{ url('approve/approve', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>

                                    <button type="submit" class="btn btn-icon btn-danger btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="tooltip-danger" data-bs-original-title="Hapus">
                                        <span class="ti ti-trash"></span>

                                    </button>
                                </form>

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
<!-- /Invoice table -->
@endsection
@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Invoice table -->

@if (auth()->user()->departement_id == 1)

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tdpmarketing as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-warning">Approve</span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tdpadmin as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-warning">Approve</span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tdp_op as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-warning">Approve</span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tkki as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-warning">Approve</span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tdp_hr as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
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
                                <span class="badge bg-primary">Menuggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break

                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menuggu Konfirmasi Pengembalian Dana </span>
                                @break

                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->departement_id == 14)
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tti as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
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
                                <span class="badge bg-primary">Menuggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break

                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menuggu Konfirmasi Pengembalian Dana </span>
                                @break

                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Departement</th>
                            <th>Keperluan</th>
                            <th>Untuk</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th>Status</th>
                            <th width='230px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($form as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-warning">Approve</span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                <form method="POST" action="{{ route('form-checkedman.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{-- @can('form-checkedman.detail') --}}
                                    <a href="{{ route('form-checkedman.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.edit') --}}
                                    <a href="{{ route('form-checkedman.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.reject') --}}
                                    <a href="{{ url('reject/maker', $data->id) }}"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Reject">
                                        <span class="ti ti-x"></span>
                                    </a>
                                    {{-- @endcan --}}

                                    {{-- @can('form-checkedman.approve') --}}
                                    <a href="{{ url('approve/maker', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('form-checkedman.delete') --}}
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    {{-- @endcan --}}
                                </form>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
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

@endsection

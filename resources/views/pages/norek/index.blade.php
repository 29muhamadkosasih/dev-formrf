@extends('layouts/master')
@section('content')
@section('title', 'No Rekening')

<!-- Invoice table -->
<div class="col-xs-4 col-sm-4 col-md-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    @if (isset($edit))
                    <h5 class="mb-0">Edit Data Nomor Rekening</h5>
                    @else
                    <h5 class="mb-0">Tambah Data Nomor Rekening</h5>
                    @endif
                </div>
                <div class="card-body">
                    @if (isset($edit))
                    @include('pages.norek.edit')
                    @else
                    @include('pages.norek.create')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if ( auth()->user()->role_id == 2)

<div class="col-xs-8 col-sm-8 col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Nomor Rekening</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th class="text-center" width='10px'>No</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Nama Penerima</th>
                            <th width='100px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($norekk as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->bank->nama_bank }}</td>
                            <td>{{ $data->no_rekening }}</td>
                            <td>{{ $data->nama_penerima }}</td>
                            <td style="text-align: center">
                                <a href="{{ route('norek.edit', $data->id) }}" class="btn btn-icon btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-warning" data-bs-original-title="Edit">
                                    <span class="ti ti-edit"></span>
                                </a>

                                <form action="{{ route('norek.destroy', $data->id) }}" class="d-inline-block"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Hapus">
                                        <span class="ti ti-trash"></span>
                                    </button>
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

<div class="col-xs-8 col-sm-8 col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Nomor Rekening</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th class="text-center" width='10px'>No</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Nama Penerima</th>
                            <th width='100px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($norek as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->bank->nama_bank }}</td>
                            <td>{{ $data->no_rekening }}</td>
                            <td>{{ $data->nama_penerima }}</td>
                            <td style="text-align: center">
                                @can('norek.edit')
                                <a href="{{ route('norek.edit', $data->id) }}" class="btn btn-icon btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-warning" data-bs-original-title="Edit">
                                    <span class="ti ti-edit"></span>
                                </a>
                                @endcan

                                @can('norek.delete')
                                <form action="{{ route('norek.destroy', $data->id) }}" class="d-inline-block"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Hapus">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>
                                @endcan
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


<!-- /Invoice table -->
@endsection
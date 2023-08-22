@extends('layouts/master')
@section('content')
@section('title', 'Keperluan')

<!-- Invoice table -->
<div class="col-xs-4 col-sm-4 col-md-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    @if (isset($edit))
                    <h5 class="mb-0">Edit Data Keperluan</h5>
                    @else
                    <h5 class="mb-0">Tambah Data Keperluan</h5>
                    @endif
                </div>
                <div class="card-body">
                    @if (isset($edit))
                    @include('pages.keperluan.edit')
                    @else
                    @include('pages.keperluan.create')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-8 col-sm-8 col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Keperluan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th class="text-center" width='10px'>No</th>
                            <th class="text-center">Keperluan</th>
                            <th width='100px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keperluan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td style="text-align: center">
                                {{-- @can('keperluan.edit') --}}
                                <a href="{{ route('keperluan.edit', $data->id) }}"
                                    class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                    data-bs-original-title="Edit">
                                    <span class="ti ti-edit"></span>
                                </a>
                                {{-- @endcan --}}

                                {{-- @can('keperluan.delete') --}}
                                <form action="{{ route('keperluan.destroy', $data->id) }}" class="d-inline-block"
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
                                {{-- @endcan --}}
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
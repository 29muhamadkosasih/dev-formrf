@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Form
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover zero-configuration">
                    <thead>
                        <tr>
                            <th width='10px' style="text-align: center">No</th>
                            <th>Tgl Pengajuan</th>
                            <th>Dari</th>
                            <th>Departement</th>
                            <th>Untuk</th>
                            <th>Pengajuan</th>
                            <th>Payment</th>
                            <th>Tgl Kebutuhan</th>
                            <th>Status</th>
                            <th width='200px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($advance as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('Y-m-d')}}
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
                                {{ $data->tanggal_kebutuhan }}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == null)
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
                            <td class="text-center">

                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('form.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @can('form.show')
                                    <a href=" {{ route('form.show', $data->id) }}" class="btn btn-icon btn-secondary
                                btn-sm">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    @endcan

                                    @can('form.edit')
                                    <a href="{{ route('form.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    @endcan
                                    @can('form.delete')
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    @endcan
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
<!-- /Invoice table -->
@endsection
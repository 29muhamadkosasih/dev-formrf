@extends('layouts/master')

@section('title', 'Roles')

@section('content')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Roles</h5>
                </div>
                <div class="col-auto">
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
                    @endcan

                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Short Code</th>
                            <th width='150px' class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($roles as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->short_code ?? '--'}}</td>
                            <td class="text-center">
                                @can('roles.show')
                                <a href="{{ route('roles.show', $data->id) }}" class="btn btn-icon btn-secondary btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-secondary" data-bs-original-title="Show">
                                    <span class="ti ti-eye"></span>
                                </a>
                                @endcan
                                @can('roles.edit')
                                <a href="{{ route('roles.edit', $data->id) }}" class="btn btn-icon btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-warning" data-bs-original-title="Edit">
                                    <span class="ti ti-edit"></span>
                                </a>
                                @endcan
                                @can('roles.delete')
                                <form action="{{ route('roles.destroy', $data->id) }}" class="d-inline-block"
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
<!-- /Invoice table -->
@endsection
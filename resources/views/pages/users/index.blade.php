@extends('layouts/master')

@section('title', 'Users')

@section('content')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Users</h5>
                </div>
                <div class="col-auto">
                    {{-- <a href="{{ url('/export_excel') }}" class="btn btn-success me-2" target="_blank">Export
                        Excel</a> --}}
                    @can('users.create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
                    @endcan
                    {{--
                    <button class="btn btn-secondary add-new btn-success" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasAddUser"><span><span class="d-none d-sm-inline-block ">Import
                                Excel</span></span></button> --}}

                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">UserName</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Roles</th>
                            <th width='150px' class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->jabatan->jabatan}}</td>
                            <td>{{$user->departement->nama_departement}}</td>
                            <td>{{$user->role->title ?? "--"}}</td>
                            <td class="text-center">
                                @can('users.delete')
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    @can('users.show')
                                    <a href="{{ route('users.show', $user->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>
                                    @endcan
                                    @can('users.edit')
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    @endcan
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" action="{{ route('import') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Import</label>
                <input type="file" class="form-control" id="add-user-fullname" name="file" />
            </div>
            <button type="reset" class="btn btn-label-secondary me-sm-3 me-1"
                data-bs-dismiss="offcanvas">Cancel</button>
            <button type="submit" class="btn btn-primary data-submit">Submit</button>
        </form>
    </div>
</div>

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

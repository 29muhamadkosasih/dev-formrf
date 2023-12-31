@extends('layouts/master')
@section('content')

@section('title', 'Bank')
<!-- Invoice table -->
<div class="col-xs-4 col-sm-4 col-md-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    @if (isset($edit))
                    <h5 class="mb-0">Edit Data Bank</h5>
                    @else
                    <h5 class="mb-0">Tambah Data Bank</h5>
                    @endif
                </div>
                <div class="card-body">
                    @if (isset($edit))
                    @include('pages.bank.edit')
                    @else
                    @include('pages.bank.create')
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
                    <h5 class="mb-0">List Data Bank</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th class="text-center" width='10px'>No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Biaya Admin (Rp.)</th>
                            <th width='150px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $data)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_bank }}</td>
                            <td> @switch($data)
                                @case($data->b_admin == NULL)
                                <span class="badge bg-primary">FREE</span>
                                @break
                                @default
                                {{ $data->b_admin }}
                                @endswitch
                            </td>
                            <td style="text-align: center">

                                @can('bank.delete')

                                <form method="POST" action="{{ route('bank.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    @can('bank.edit')
                                    <a href="{{ route('bank.edit', $data->id) }}"
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
<!-- /Invoice table -->
@endsection
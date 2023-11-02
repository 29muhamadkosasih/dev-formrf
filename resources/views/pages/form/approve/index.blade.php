@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Invoice table -->

<div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Pengajuan
                </div>
            </div>
            <form action="{{ route('laporan.getLaporan.reportApprove') }}" method="POST">
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
                            <th>No RF</th>
                            <th>Dari</th>
                            <th>Tanggal <br> Kebutuhan</th>
                            <th>Keperluan</th>
                            <th>Departement</th>
                            <th>Kategori <br>
                                Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th>Status</th>
                            <th>Jumlah Total (Rp.)</th>
                            <th width='180px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($form as $data) <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->no_rf }}
                            </td>
                            <td>
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->keperluan->name }} </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>

                            <td>
                                {{ $data->payment }}
                            </td>

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
                            <td style="text-align:right">
                                {{ number_format($data->jumlah_total, 0, ',', '.') }}
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

                                <form method="POST" action="{{ route('form-approve.destroy', $data->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('form-approve.detail', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Detail">
                                        <span class="ti ti-eye"></span>
                                    </a>
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

                                    <a href="{{ url('approve/approve', $data->id) }}"
                                        class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                        data-bs-original-title="Approve">
                                        <span class="ti ti-check"></span>
                                    </a>

                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>

                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr style="background-color: skyblue">
                        <td colspan="9" style="text-align: right">TOTAL</td>
                        <td colspan="1" style="text-align: right">{{ number_format($jumlah_total, 0, ',', '.') }}</td>
                        <td></td>
                    </tr>
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
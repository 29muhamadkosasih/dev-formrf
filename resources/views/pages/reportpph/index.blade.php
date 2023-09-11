@extends('layouts/master')

@section('title', 'Report PPH 23')

@section('content')
<!-- Invoice table -->
<div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Report PPH 23
                </div>
            </div>
            <form action="{{ route('laporan.getLaporan.reportpph') }}" method="POST">
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
                    <h5 class="mb-0">List Data Report PPH 23</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ url('/export_excel/reportpph') }}" class="btn btn-success me-2" target="_blank">
                        <span class="ti ti-arrow-bar-to-down"></span>&nbsp;
                        Excel</a>
                    <a href="{{ route('reportpph.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">No Invoice</th>
                            <th class="text-center">Bruto (Rp.)</th>
                            <th class="text-center">Amount Payment In (Rp.)</th>
                            <th class="text-center">Paid Date</th>
                            <th class="text-center">PPH 23 (Rp.)</th>
                            <th class="text-center">Npwp</th>
                            <th class="text-center">Masa Pajak</th>
                            <th class="text-center">No Bukpot</th>
                            <th class="text-center">Tanggal Pemotongan</th>
                            <th width='150px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($reportpph as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$user->client}}</td>
                            <td>{{$user->no_invoice}}</td>
                            <td style="text-align: right">

                                {{ number_format($user->bruto, 0, ',', '.') }}
                            </td>
                            <td style="text-align: right">

                                {{ number_format($user->payment_in, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($user->paid_date)->format('d-m-Y') }}
                            </td>
                            <td style="text-align: right">

                                {{ number_format($user->pph23, 0, ',', '.') }}
                            </td>
                            <td>{{$user->npwp}}</td>
                            <td>{{$user->masa_pajak}}</td>
                            <td>{{$user->no_bukpot}}</td>
                            <td>
                                @switch($user)
                                @case($user->tgl_pemotongan == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->tgl_pemotongan)->format('d-m-Y') }}
                                @endswitch
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('reportpph.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('reportpph.edit', $user->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    <button type="submit" class="btn btn-icon btn-danger btn-sm show_confirm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete"
                                        aria-describedby="tooltip358783">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr style="color:black; background-color: lightgreen">
                        <th colspan="3" style="text-align: right">TOTAL</th>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_a, 0, ',', '.') }}
                            {{-- 90 --}}
                        </td>
                        <td colspan="1" style="text-align: right">
                            {{ number_format($jumlah_b, 0, ',', '.') }}
                            {{-- 90 --}}
                        </td>
                        <td></td>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_c, 0, ',', '.') }}
                            {{-- 90 --}}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
@endsection

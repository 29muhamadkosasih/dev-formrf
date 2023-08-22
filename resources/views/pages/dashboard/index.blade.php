@extends('layouts.master')

@section('content')
@section('title', 'Dashboard')

<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0">Total RF</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2">{{ $reportss }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0">Total Amount RF</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2">{{ number_format($jumlah_total, 0, ',', '.',) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0">Total RF Perbulan</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2">{{ $reports }} / {{ $namaBulan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0">Amount RF Perbulan</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2">{{ number_format($jumlah_total2, 0, ',', '.',) }} /
                            {{
                            $namaBulan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data RF</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tgl Pengajuan</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tgl Kebutuhan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->tanggal_kebutuhan)->format('d-m-Y')}}

                            </td>
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
                                <a href=" {{ route('form.showDetail', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                                <span class="badge bg-success">PAID</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var _ydata=JSON.parse('{!! json_encode($months) !!}');
	var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
</script>
@endsection

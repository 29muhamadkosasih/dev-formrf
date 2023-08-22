@extends('layouts.master')

@section('content')
@section('title', 'Dashboard')

{{-- <div class="col-xl-3 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="badge p-2 bg-label-info mb-2 rounded">
                <i class="ti ti-file-plus ti-md"></i>
            </div>
            <h5 class="card-title mb-1 pt-2">Total RF</h5>
            <h5 class="card-title mb-1 pt-2">{{ $total }}</h5>

        </div>
    </div>
</div>

<!-- Total Profit -->
<div class="col-xl-3 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="badge p-2 bg-label-success mb-2 rounded">
                <i class="ti ti-check ti-md"></i>
            </div>
            <h5 class="card-title mb-1 pt-2">Paid RF</h5>
            <h5 class="card-title mb-1 pt-2">{{$paid}}</h5>
        </div>
    </div>
</div>

<!-- Total Sales -->
<div class="col-xl-3 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="badge p-2 bg-label-primary mb-2 rounded"><i class="ti ti-loader ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Process RF</h5>
            <h5 class="card-title mb-1 pt-2">{{ $process }}</h5>
        </div>
    </div>
</div>

<div class="col-xl-3 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-x ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Cancel RF</h5>
            <h5 class="card-title mb-1 pt-2">{{ $cancel }}</h5>
        </div>
    </div>
</div> --}}


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
<div class="col-xl-6 mb-4">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 card-title">Highchart Total RF Perbulan</h5>

        </div>
        <div class="card-body"><canvas id="myAreaChart" width="100%" height="75"></canvas></div>
    </div>
</div>

<div class="col-xl-6 mb-4">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 card-title">Line Total RF Perbulan</h5>
        </div>
        <div class="card-body"><canvas id="myBarChart" width="100%" height="75"></canvas></div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Pengajuan</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal Kebutuhan</th>
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
                                {{ $data->user->name }}
                            </td>
                            <td>
                                {{ $data->departement->nama_departement }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }} </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
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

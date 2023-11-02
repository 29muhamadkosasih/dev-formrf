@extends('layouts.master')
@section('content')
@section('title', 'Dashboard')
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body" style="background-color: #FF6961">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0 text-white">Total RF</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2 text-white">{{ $reportss }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body" style="background-color: #EEE600">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0 text-white">Total Amount RF</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2 text-white">{{ number_format($jumlah_total, 0, ',', '.',) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body" style="background-color:#03C03C">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0 text-white">Total RF Perbulan</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2 text-white">{{ $reports }} / {{ $namaBulan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3 mb-3">
    <div class="card">
        <div class="card-body" style="background-color: #5E96C3">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                    <h5 class="card-title mb-0 text-white">Amount RF Perbulan</h5>
                    <div class="d-flex align-items-center my-1">
                        <h4 class="mb-0 me-2 text-white">{{ number_format($jumlah_total2, 0, ',', '.',) }} /
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
            <h5 class="m-0 card-title">Total RF Perbulan</h5>
        </div>
        <div id="piechart" style="width: 100%; height: 400px;"></div>
    </div>
</div>

<div class="col-xl-6 mb-4">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 card-title">Total Amount RF Perbulan</h5>
        </div>
        <div id="chart_div" style="width: 100%; height: 400px;"></div>
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
                <table class="table table-hover table-bordered dataex-fixh-responsive">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tanggal <br> Pengajuan</th>
                            <th class="text-center">Dari</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tanggal <br> Kebutuhan</th>
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
                                <span class="badge bg-primary">Menunggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break
                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menunggu Konfirmasi Pengembalian Dana </span>
                                @break
                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                                <a href=" {{ route('form.showDetailGen', $data->id) }}"
                                    class="btn btn-icon btn-secondary btn-sm">
                                    <span class="ti ti-eye"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.css"
    integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"
    integrity="sha512-9ktqS1nS/L6/PPv4S4FdD2+guYGmKF+5DzxRKYkS/fV5gR0tXoDaLqqQ6V93NlTj6ITsanjwVWZ3xe6YkObIQQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    var data = new google.visualization.DataTable();
        data.addColumn('string', 'Bulan');
        data.addColumn('number', 'Total Penjualan');

        @foreach($salesData as $data)
        data.addRow(['Bulan {{$data->bulan}}', {{$data->total_penjualan}}]);
        @endforeach
</script>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function getMonthName(monthNumber) {
        var monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        return monthNames[monthNumber - 1];
    }

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Bulan');
        data.addColumn('number', 'Total Amount RF PerBulan');
        data.addRows([
            @foreach($salesData as $data)
                [getMonthName({{$data->bulan}}), {{$data->total_penjualan}}],
            @endforeach
        ]);

        var options = {
            width: '100%', // Lebar grafik diatur 100% untuk responsif
            height: '100%',
            // Anda dapat menambahkan opsi lainnya di sini
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php echo $chartData ?>
        ]);

        var options = {
            width: '100%', // Lebar grafik diatur 100% untuk responsif
            height: '100%',
            is3D: true,
            colors: ['#FF5733', '#FFC300', '#DAF7A6', '#FF5733', '#C70039'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endsection
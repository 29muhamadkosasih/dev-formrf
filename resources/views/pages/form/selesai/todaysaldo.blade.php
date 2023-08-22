@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Projects table -->
<div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Tanggal : {{ $currentDate }}
                </div>
            </div>
            <a href="javascript:window.print()" class="mb-2">Print OUT </a>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Payment Method</th>
                            <th>Kategori
                                Pengajuan</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($form as $data)
                        {{-- <tr colspan="5" class="mb-2">
                            <a href="{{ url('form-list/print', $data->id) }}" target="_blank">
                                <i class="menu-icon tf-icons ti ti-download"></i>
                            </a>
                        </tr> --}}
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>

                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td style="text-align :right ">
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="4" style="text-align :right ">TOTAL CASH</th>
                            <td style="text-align :right"> {{ number_format($jumlah_total, 0, ',',
                                '.') }}</td>
                        </tr>

                        @forelse ($form2 as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->user->name }}
                            </td>

                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }} </td>
                            <td style="text-align :right ">
                                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="4" style="text-align :right ">TOTAL TRANSFER </th>
                            <td style="text-align :right"> {{ number_format($jumlah_total2, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="4" style="text-align :right ">JUMLAH TOTAL </th>
                            <td style="text-align :right"> {{ number_format($jumlah_total3, 0, ',',
                                '.') }}</td>
                        </tr>
                    </tbody>
                    @foreach ($latestData as $item)
                    <tr style="color:black; background-color: lightgreen">
                        <th colspan="4" style="text-align :right ">JUMLAH TOTAL SALDO </th>

                        <td style="text-align :right">{{ number_format($item->jumlah_saldo, 0, ',',
                            '.') }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
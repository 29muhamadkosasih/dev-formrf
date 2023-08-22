@extends('layouts/master')
@section('content')
@section('title', 'Resume RF')
<!-- Projects table -->
<div class="col-12 col-xl-9 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Tanggal : {{ $currentDate }}
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th>Dari</th>
                            <th>Payment Method</th>
                            <th>Bank</th>
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
                                @switch($data)
                                @case($data->payment == 'Transfer')
                                {{ $data->norek->bank->nama_bank }}
                                @break
                                @default
                                <span class="badge bg-info">
                                    <i data-feather='dollar-sign'></i>
                                    Cash
                                </span>
                                @endswitch
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
                            <th colspan="5" style="text-align :right ">TOTAL CASH</th>
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
                                {{ $data->norek->bank->nama_bank }}
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
                            <th colspan="5" style="text-align :right ">TOTAL TRANSFER </th>
                            <td style="text-align :right"> {{ number_format($jumlah_total2, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="5" style="text-align :right ">TOTAL BIAYA TRANSFER </th>
                            <td style="text-align :right"> {{ number_format($jumlah_admin, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="5" style="text-align :right ">JUMLAH TOTAL </th>
                            <td style="text-align :right"> {{ number_format($jumlah_akhir, 0, ',',
                                '.') }}</td>
                        </tr>
                        @foreach ($latestData as $item)
                        <tr style="color:black; background-color: lightgreen">
                            <th colspan="5" style="text-align :right ">JUMLAH TOTAL SALDO </th>

                            <td style="text-align :right">{{ number_format($item->jumlah_saldo, 0, ',',
                                '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Projects table -->
<!-- Source Visit -->
<div class="col-xl-3 col-md-6 order-2 order-lg-1">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Report PB</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('saldoStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Saldo 899</label>
                    <input type="number" class="form-control @error('jumlah_saldo') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo" name="jumlah_saldo" required />
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2 mb-2 d-none"></button>
            </form>
            <form action="{{ route('reportPB.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">PB 899-893</label>
                    <input type="number" class="form-control @error('a_b') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo" name="a_b" />
                </div>
                <div class="mb-3">
                    <label class="form-label">PB 893-899</label>
                    <input type="number" class="form-control @error('b_a') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Saldo" name="b_a" />
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary float-end ms-2 mb-2 d-none">Submit</button>
            </form>
        </div>
    </div>
    <div class="card-body">
    </div>
</div>
<!--/ Source Visit -->
@endsection
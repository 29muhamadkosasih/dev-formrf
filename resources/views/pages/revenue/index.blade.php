@extends('layouts/master')
@section('content')

@section('title', 'Revenue')
<!-- Invoice table -->
<div class="col-xs-4 col-sm-4 col-md-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    @if (isset($edit))
                    <h5 class="mb-0">Edit A/E Revenue</h5>
                    @else
                    <h5 class="mb-0">Tambah A/E Revenue</h5>
                    @endif
                </div>
                <div class="card-body">
                    @if (isset($edit))
                    @include('pages.revenue.edit')
                    @else
                    @include('pages.revenue.create')
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
                    <h5 class="mb-0">List A/E Revenue</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th class="text-center" width='10px'>No</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Amount (Rp.)</th>
                            <th width='150px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenue as $data)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->date )->format('d-m-Y') }}
                            </td>
                            <td>{{ $data->ket }}</td>
                            <td style="text-align: right">
                                {{ number_format($data->amount_invoice, 0, ',', '.') }}

                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('revenue.edit', $data->id) }}" class="btn btn-icon btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-warning" data-bs-original-title=" Edit">
                                    <span class="ti ti-edit"></span>
                                </a>
                                <form action="{{ route('revenue.destroy', $data->id) }}" class="d-inline-block"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Hapus">
                                        <span class="ti ti-trash "></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr></tr>
                    <tr style="color:black; background-color: lightgreen">
                        <th colspan="3" style="text-align: right">TOTAL</th>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_a, 0, ',', '.') }}
                            {{-- 90 --}}
                        </td>
                        <td colspan="1" style="text-align: right"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Invoice table -->
@endsection
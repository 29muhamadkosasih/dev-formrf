@extends('layouts/master')
@section('content')

@section('title', 'Report PB')

<!-- Invoice table -->

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Data Report PB
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">899-893 (RP)</th>
                            <th style="text-align: center">893-899 (RP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y') }}
                            </td>
                            <td style="text-align :right">
                                {{ number_format($data->a_b, 0, ',', '.') }}
                            </td>
                            <td style="text-align :right">
                                {{ number_format($data->b_a, 0, ',', '.') }}
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
@endsection

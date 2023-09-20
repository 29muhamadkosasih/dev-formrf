@extends('layouts/master')
@section('title', 'Report PPH 23')
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Report PPH 23
                        Tanggal &nbsp;
                        <b>
                            {{ \Carbon\Carbon::parse($from)->format('d-m-Y')}}
                        </b>
                        Sampai
                        <b>
                            {{ \Carbon\Carbon::parse($to)->format('d-m-Y')}}
                        </b>
                    </h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('reportpph.index' ) }}" class="btn btn-secondary btn-sm"><i
                            class="menu-icon tf-icons ti ti-brand-gravatar"></i>Reset</a>
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
                                <a href="{{ route('reportpph.edit', $user->id) }}"
                                    class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                    data-bs-original-title="Edit">
                                    <span class="ti ti-edit"></span>
                                </a>
                                <form action="{{ route('reportpph.destroy', $user->id) }}" class="d-inline-block"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-danger"
                                        data-bs-original-title="Hapus">
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
@endsection
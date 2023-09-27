@extends('layouts/master')

@section('title', 'Invoice & Payment In')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Invoice & Pembayaran

                        Dengan Kategori

                        @switch($kat)
                        @case($kat == 'due_date')
                        <b>TGL JATUH TEMPO</b>
                        @break
                        @default
                        @endswitch

                        @switch($kat)
                        @case($kat == 'paid_date')
                        <b>TGL PENERIMAAN</b>
                        @break
                        @default
                        @endswitch

                        @switch($kat)
                        @case($kat == 'date_invoice')
                        <b>TGL INV</b>
                        @break
                        @default
                        @endswitch


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
                <div class="col-auto mt-1">
                    <a href="{{ route('invpayment.index' ) }}" class="btn btn-secondary btn-sm"><i
                            class="menu-icon tf-icons ti ti-brand-gravatar"></i>Reset</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='5' style="text-align: center">No</th>
                            <th width='50px' class="text-center">No <br> Project</th>
                            <th width='50px' class="text-center">Nama Client</th>
                            <th width='50px' class="text-center">No Inv</th>
                            {{-- <th class="text-center">No PO</th> --}}
                            <th width='50px' class="text-center">Tanggal <br> Inv</th>
                            <th width='50px' class="text-center">Nominal <br> Inv (Rp.)</th>
                            <th width='50px' class="text-center">Jatuh <br> Tempo </th>
                            <th width='50px' class="text-center">Nominal <br> Penerimaan <br> (Rp.)</th>
                            <th width='50px' class="text-center">Tanggal <br> Penerimaan</th>
                            <th width='50px' class="text-center">Pot. <br> PPH 23</th>
                            <th width='50px' class="text-center">Keterangan</th>
                            <th width='50px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($invpayment as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>
                                @switch($user)
                                @case($user->no_project == null)
                                @break
                                @default
                                {{$user->no_project}}
                                @endswitch

                            </td>
                            <td>

                                @switch($user)
                                @case($user->pic_client == null)
                                @break
                                @default
                                {{$user->pic_client}}
                                @endswitch
                            </td>
                            <td>

                                @switch($user)
                                @case($user->no_invoice == null)
                                @break
                                @default
                                {{$user->no_invoice}}
                                @endswitch
                            </td>
                            {{-- <td>

                                @switch($user)
                                @case($user->no_po == null)
                                @break
                                @default
                                {{$user->no_po}}
                                @endswitch

                            </td> --}}
                            <td>
                                @switch($user)
                                @case($user->date_invoice == null)
                                @break
                                @default
                                {{-- {{$user->date_invoice}} --}}

                                {{ \Carbon\Carbon::parse($user->date_invoice)->format('d-m-Y') }}

                                @endswitch

                            </td>
                            <td style="text-align: right">

                                @switch($user)
                                @case($user->amount_invoice == null)
                                @break
                                @default
                                {{ number_format($user->amount_invoice, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td>

                                @switch($user)
                                @case($user->due_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->due_date)->format('d-m-Y') }}
                                @endswitch
                            </td>
                            <td style="text-align: right">

                                @switch($user)
                                @case($user->payment_in == null)
                                @break
                                @default
                                {{ number_format($user->payment_in, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td>
                                @switch($user)
                                @case($user->paid_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->paid_date)->format('d-m-Y') }}

                                @endswitch
                            </td>
                            <td style="text-align: right">
                                @switch($user)
                                @case($user->deduction == null)
                                @break
                                @default
                                {{ number_format($user->deduction, 0, ',', '.') }}
                                @endswitch
                            </td>
                            <td>
                                @switch($user)
                                @case($user->ket == null)
                                @break
                                @default
                                {{ $user->ket }}
                                @endswitch
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('invpayment.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('invpayment.edit', $user->id) }}"
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
                        <th colspan="5" style="text-align: right"><b>TOTAL</b></th>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_a, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td colspan="" style="text-align: right">
                            {{ number_format($jumlah_b, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td colspan="" style="text-align: right">

                            {{ number_format($jumlah_c, 0, ',', '.') }}
                        </td>
                        <td colspan="" style="text-align: right"></td>
                        <td colspan="" style="text-align: right"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Import</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="add-new-user pt-0" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Import</label>
                        <input type="file" class="form-control" id="add-user-fullname" name="file" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
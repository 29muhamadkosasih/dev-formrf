@extends('layout.master')
@section('content')
@section('title', 'Form')
<section id="complex-header-datatable">
    <div class="row">
        <div class="offset-2 col-9">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title mb-50">Pengajuan Dana</h4>
                    <a href="{{ url('form/print', $show->id) }}" target="_blank" class="btn btn-primary"><i
                            data-feather="download"></i>
                        PDF</a>
                </div>
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-xl-7 col-12">
                            <dl class="row mb-0">
                                <dt class="col-sm-4 fw-bolder mb-1"> Dari </dt>
                                <dd class="col-sm-8 mb-1">: {{ $show->user->name }}</dd>

                                <dt class="col-sm-4 fw-bolder mb-1">Departement</dt>
                                <dd class="col-sm-8 mb-1">: {{ $show->departement->nama_departement }}</dd>

                                <dt class="col-sm-4 fw-bolder mb-1">Untuk</dt>
                                <dd class="col-sm-8 mb-1">: {{ $show->to }}</dd>


                            </dl>
                        </div>
                        <div class="col-xl-5 col-12">
                            <dl class="row mb-0">
                                <dt class="col-sm-4 fw-bolder mb-1">Pengajuan</dt>
                                <dd class="col-sm-8 mb-1">: {{ $show->ketegori_pengajuan }}</dd>

                                <dt class="col-sm-4 fw-bolder mb-1">Payment</dt>
                                <dd class="col-sm-8 mb-1">: {{ $show->payment }}</dd>

                                <dt class="col-sm-4 fw-bolder mb-1">Tgl Kebutuhan</dt>
                                <dd class="col-sm-8 mb-1">: {{
                                    \Carbon\Carbon::parse($show->tanggal_kebutuhan)->format('d-m-Y') }}</dd>

                            </dl>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="background-color: skyblue">
                                        <th width='20px'>No</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Unit Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $show->description }} </td>
                                        <td>{{ $show->qty }}</td>
                                        <td>{{ $show->unit }}</td>
                                        <td>Rp. {{ number_format($show->price, 0, ',', '.',) }}</td>
                                        <td>Rp. {{ number_format($show->total, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>{{ $show->description2 }} </td>
                                        <td>{{ $show->unit2 }}</td>
                                        <td>{{ $show->qty2 }}</td>
                                        <td>
                                            @switch($show)
                                            @case($show->price2 == null)
                                            @break
                                            @default
                                            Rp. {{ number_format($show->price2, 0, ',', '.') }}
                                            @endswitch </td>
                                        <td>
                                            @switch($show)
                                            @case($show->total2 == '0')
                                            @break
                                            @default
                                            Rp. {{ number_format($show->total2, 0, ',', '.') }}
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>{{ $show->description3 }} </td>
                                        <td>{{ $show->unit3 }}</td>
                                        <td>{{ $show->qty3 }}</td>
                                        <td>
                                            @switch($show)
                                            @case($show->price3 == null)
                                            @break
                                            @default
                                            Rp. {{ number_format($show->price3, 0, ',', '.') }}
                                            @endswitch </td>
                                        <td>
                                            @switch($show)
                                            @case($show->total3 == '0')
                                            @break
                                            @default
                                            Rp. {{ number_format($show->total3, 0, ',', '.') }}
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>{{ $show->description4 }} </td>
                                        <td>{{ $show->unit4 }}</td>
                                        <td>{{ $show->qty4 }}</td>
                                        <td>
                                            @switch($show)
                                            @case($show->price4 == null)
                                            @break
                                            @default
                                            Rp. {{ number_format($show->price4, 0, ',', '.') }}
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($show)
                                            @case($show->total4 == '0')
                                            @break
                                            @default
                                            Rp. {{ number_format($show->total4, 0, ',', '.') }}
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr style="color:black; background-color: lightgreen">
                                        <th colspan="5" style="text-align: right ">TOTAL</th>
                                        <td>Rp. {{ number_format($show->jumlah_total, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="container-fluid mt-1">
                        <div class="row justify-content-evenly">
                            <div class="col-4">
                                Checked By : {{ $show->checked_by }}
                            </div>
                            <div class="col-4">
                                Approve By : {{ $show->approve_by }}
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!--/ Billing Address -->
        </div>
    </div>
</section>

@endsection

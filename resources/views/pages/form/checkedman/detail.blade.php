@extends('layouts.master')
@section('content')
@section('title', 'Form')
<div class="col-12">
    <div class="card">
        <div class="card-body mt-2">
            <div class="row mb-3" style="text-align right">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">PENGAJUAN DANA</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('form-checkedman.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-12">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-bolder mb-1"> Dari </dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->user->name }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Departement</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->departement->nama_departement }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Payment</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->payment }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Tgl Kebutuhan</dt>
                        <dd class="col-sm-8 mb-1"> {{ \Carbon\Carbon::parse($show->tanggal_kebutuhan)->format('d-m-Y')}}
                        </dd>

                        @switch($show)
                        @case($show->payment == 'Transfer')
                        <dt class="col-sm-4 fw-bolder mb-1">Nomor Rekening</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->norek->no_rekening }}</dd>
                        @break
                        @default
                        @endswitch
                        @switch($show)
                        @case($show->payment == 'Transfer')
                        <dt class="col-sm-4 fw-bolder mb-1">Bank</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->norek->bank->nama_bank }}</dd>
                        @break
                        @default
                        @endswitch
                        @switch($show)
                        @case($show->payment == 'Transfer')
                        <dt class="col-sm-4 fw-bolder mb-1">A/n</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->norek->nama_penerima }}</dd>
                        @break
                        @default
                        @endswitch
                    </dl>
                </div>
                <div class="col-xl-5 col-12">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-bolder mb-1">Pengajuan</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->kpengajuan->name }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Untuk</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->rujukan->name }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Keperluan</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->keperluan->name }}</dd>
                        @switch($show)
                        @case($show->keperluan_id == 1)
                        <dt class="col-sm-4 fw-bolder mb-1">No Project</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->no_project }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Jumlah Peserta</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->j_peserta }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Jumlah Trainer/Asesor</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->j_traine_asesor }}</dd>

                        <dt class="col-sm-4 fw-bolder mb-1">Jumlah Assist</dt>
                        <dd class="col-sm-8 mb-1"> {{ $show->j_assist }}</dd>
                        @break
                        @default
                        @endswitch



                    </dl>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr width='20px' style="background-color:skyblue">
                                <th width='20px'>No</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Lampiran</th>
                                <th class="text-center" style="text-align center">Unit Price (Rp)</th>
                                <th class="text-center" style="text-align center">Sub Total (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $show->description }} </td>
                                <td>{{ $show->qty }}</td>
                                <td>{{ $show->unit }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image1 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image1) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image1 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right"> {{ number_format($show->price, 0, ',', '.',) }}
                                </td>
                                <td style="text-align :right">{{ number_format($show->total, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{ $show->description2 }} </td>
                                <td>{{ $show->qty2 }}</td>
                                <td>{{ $show->unit2 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image2 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image2) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image2 }}
                                    </a>
                                    @endswitch
                                </td>

                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price2 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price2, 0, ',', '.') }}
                                    @endswitch </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total2 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total2, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{ $show->description3 }} </td>
                                <td>{{ $show->qty3 }}</td>
                                <td>{{ $show->unit3 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image3 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image3) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image3 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price3 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price3, 0, ',', '.') }}
                                    @endswitch </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total3 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total3, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{ $show->description4 }} </td>
                                <td>{{ $show->qty4 }}</td>
                                <td>{{ $show->unit4 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image4 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image4) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image4 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price4 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price4, 0, ',', '.') }}
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total4 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total4, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $show->description5 }} </td>
                                <td>{{ $show->qty5 }}</td>
                                <td>{{ $show->unit5 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image5 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image5) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image5 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price5 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price5, 0, ',', '.') }}
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total5 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total5, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>{{ $show->description6 }} </td>
                                <td>{{ $show->qty6 }}</td>
                                <td>{{ $show->unit6 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image6 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image6) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image6 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price6 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price6, 0, ',', '.') }}
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total6 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total6, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>{{ $show->description7 }} </td>
                                <td>{{ $show->qty7 }}</td>
                                <td>{{ $show->unit7 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image7 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image7) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image7 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price7 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price7, 0, ',', '.') }}
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total7 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total7, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>{{ $show->description8 }} </td>
                                <td>{{ $show->qty8 }}</td>
                                <td>{{ $show->unit8 }}</td>
                                <td>
                                    @switch($show)
                                    @case($show->image8 == 0)
                                    @break
                                    @default
                                    <a href="{{ url('form/download/' . $show->image8) }}" target="_blank"
                                        class="text-primary font-weight-bold"> <i data-feather="download"></i>
                                        {{ $show->image8 }}
                                    </a>
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->price8 == null)
                                    @break
                                    @default
                                    {{ number_format($show->price8, 0, ',', '.') }}
                                    @endswitch
                                </td>
                                <td style="text-align :right">
                                    @switch($show)
                                    @case($show->total8 == '0')
                                    @break
                                    @default
                                    {{ number_format($show->total8, 0, ',', '.') }}
                                    @endswitch
                                </td>
                            </tr>
                            @switch($show)
                            @case($show->payment == 'Transfer')
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="6" style="text-align :right ">Biaya Admin</th>
                                <td style="text-align :right">{{ $show->b_admin }}</td>
                            </tr>
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="6" style="text-align :right ">TOTAL</th>
                                <td style="text-align :right"> {{ number_format($show->jumlah_total, 0, ',',
                                    '.') }}</td>
                            </tr>
                            @break
                            @default
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="6" style="text-align :right ">TOTAL</th>
                                <td style="text-align :right"> {{ number_format($show->jumlah_total, 0, ',',
                                    '.') }}</td>
                            </tr>
                            @endswitch
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Billing Address -->
</div>

@endsection

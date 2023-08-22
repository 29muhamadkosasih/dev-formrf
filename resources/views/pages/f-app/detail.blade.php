@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Projects table -->
<div class="col-12 col-xl-8 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-body mt-2">
            <div class="row mb-3" style="text-align right">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">PENGAJUAN DANA</h5>
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
                        <dd class="col-sm-8 mb-1">
                            {{ \Carbon\Carbon::parse($show->tanggal_kebutuhan)->format('d-m-Y')}}</dd>

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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr width='20px' style="background-color:skyblue">
                                <th width='20px'>No</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Unit</th>
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
                            <tr>
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="5" style="text-align :right ">Biaya Admin</th>
                                <td style="text-align :right">
                                    {{ number_format($show->b_admin, 0, ',',
                                    '.') }}
                                </td>
                            </tr>
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="5" style="text-align :right ">TOTAL</th>
                                <td style="text-align :right"> {{ number_format($show->jumlah_total, 0, ',',
                                    '.') }}</td>
                            </tr>
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="2" style="text-align: right">Tanggal Uang Masuk</th>
                                <td colspan="2" style="text-align: right"> {{
                                    \Carbon\Carbon::parse($show->tgl_terima_dana)->format('d-m-Y') }}
                                </td>
                                <th colspan="1" style="text-align: right">Jumlah Uang Masuk</th>
                                <td colspan="2" style="text-align: right"> {{ number_format($show->jumlah_dana, 0, ',',
                                    '.') }}
                                </td>
                            </tr>
                            @break
                            @default
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="5" style="text-align :right ">TOTAL</th>
                                <td style="text-align :right"> {{ number_format($show->jumlah_total, 0, ',',
                                    '.') }}</td>
                            </tr>
                            <tr style="color:black; background-color: lightgreen">
                                <th colspan="2" style="text-align: right">Tanggal Uang Masuk</th>
                                <td colspan="2" style="text-align: right"> {{
                                    \Carbon\Carbon::parse($show->tgl_terima_dana)->format('d-m-Y') }}
                                </td>
                                <th colspan="1" style="text-align: right">Jumlah Uang Masuk</th>
                                <td colspan="2" style="text-align: right"> {{ number_format($show->jumlah_dana, 0, ',',
                                    '.') }}
                                </td>
                            </tr>
                            @endswitch
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Projects table -->
<!-- Source Visit -->
<div class="col-xl-4 col-md-6 order-2 order-lg-1">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Transaksi Pembayaran</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('form-app.kPembayaran', $show->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="d-none">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Dari</label>
                                <input type="hidden" name="from_id" value="{{ $show->from_id }}" />
                                <input type="hidden" name="kpengajuan_id" value="{{ $show->kpengajuan_id }}" />
                                <input type="hidden" name="keperluan_id" value="{{ $show->keperluan_id }}" />
                                <input type="hidden" name="tanggal_kebutuhan" value="{{ $show->tanggal_kebutuhan }}" />
                                <input type="hidden" name="payment" value="{{ $show->payment }}" />
                                <input type="hidden" name="rujukan_id" value="{{ $show->rujukan_id }}" />
                                <input type="hidden" name="norek_id" value="{{ $show->norek_id }}" />
                                <input type="hidden" name="departement_id" value="{{ $show->departement_id }}" />
                                <input type="hidden" name="tgl_terima_dana" value="{{ $show->tgl_terima_dana }}" />
                                <input type="hidden" name="jumlah_dana" value="{{ $show->jumlah_dana }}" />
                                <input type="hidden" name="jumlah_total" value="{{ $show->jumlah_total }}" />

                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordionIcon" class="d-none">

                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                Pengajuan 1
                            </button>
                        </h2>
                        <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description"
                                                placeholder="Enter" value="{{ $show->description }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit"
                                                placeholder="Enter" value="{{ $show->unit }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price"
                                                placeholder="Enter" value="{{ $show->price }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty"
                                                placeholder="Enter" value="{{ $show->qty }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-3" aria-expanded="true" aria-controls="accordionIcon-3">
                                Pengajuan 2
                            </button>
                        </h2>
                        <div id="accordionIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description2"
                                                placeholder="Enter" value="{{ $show->description2 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit2"
                                                placeholder="Enter" value="{{ $show->unit2 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price2"
                                                placeholder="Enter" value="{{ $show->price2 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty2"
                                                placeholder="Enter" value="{{ $show->qty2 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconFour">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-4" aria-expanded="true" aria-controls="accordionIcon-4">
                                Pengajuan 3
                            </button>
                        </h2>
                        <div id="accordionIcon-4" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description3"
                                                placeholder="Enter" value="{{ $show->description3 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit3"
                                                placeholder="Enter" value="{{ $show->unit3 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price3"
                                                placeholder="Enter" value="{{ $show->price3 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty3"
                                                placeholder="Enter" value="{{ $show->qty3 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-1" aria-expanded="true" aria-controls="accordionIcon-1">
                                Pengajuan 4
                            </button>
                        </h2>
                        <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description4"
                                                placeholder="Enter" value="{{ $show->description4 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit4"
                                                placeholder="Enter" value="{{ $show->unit4 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price4"
                                                placeholder="Enter" value="{{ $show->price4 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty4"
                                                placeholder="Enter" value="{{ $show->qty4 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconFive">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-5" aria-expanded="true" aria-controls="accordionIcon-5">
                                Pengajuan 5
                            </button>
                        </h2>
                        <div id="accordionIcon-5" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description5"
                                                placeholder="Enter" value="{{ $show->description5 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit5"
                                                placeholder="Enter" value="{{ $show->unit5 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price5"
                                                placeholder="Enter" value="{{ $show->price5 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty5"
                                                placeholder="Enter" value="{{ $show->qty5 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconSix">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-6" aria-expanded="true" aria-controls="accordionIcon-6">
                                Pengajuan 6
                            </button>
                        </h2>
                        <div id="accordionIcon-6" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description6"
                                                placeholder="Enter" value="{{ $show->description6 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit6"
                                                placeholder="Enter" value="{{ $show->unit6 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price6"
                                                placeholder="Enter" value="{{ $show->price6 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty6"
                                                placeholder="Enter" value="{{ $show->qty6 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconSeven">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-7" aria-expanded="true" aria-controls="accordionIcon-7">
                                Pengajuan 7
                            </button>
                        </h2>
                        <div id="accordionIcon-7" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description7"
                                                placeholder="Enter" value="{{ $show->description7 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit7"
                                                placeholder="Enter" value="{{ $show->unit7 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price7"
                                                placeholder="Enter" value="{{ $show->price7 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty7"
                                                placeholder="Enter" value="{{ $show->qty7}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconEight">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#accordionIcon-8" aria-expanded="true" aria-controls="accordionIcon-8">
                                Pengajuan 8
                            </button>
                        </h2>
                        <div id="accordionIcon-8" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Description</label>
                                            <input type="text" class="form-control" id="basicInput" name="description8"
                                                placeholder="Enter" value="{{ $show->description8 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit8"
                                                placeholder="Enter" value="{{ $show->unit8 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="helpInputTop">Price</label>
                                            <input type="text" class="form-control" id="basicInput" name="price8"
                                                placeholder="Enter" value="{{ $show->price8 }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Qty</label>
                                            <input type="number" class="form-control" id="basicInput" name="qty8"
                                                placeholder="Enter" value="{{ $show->qty8 }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Pemakaian</label>
                    <input type="number" class="form-control @error('jumlah_pemakaian') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Uang" name="jumlah_pemakaian"
                        value="{{ old('jumlah_pemakaian') }}" />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success float-end ms-2"> <span class="ti ti-check"></span>
                        &nbsp; Process</button>
                    <a href="{{ route('form-app.index') }}" class="btn btn-secondary float-end ">Back</a>
            </form>
        </div>
    </div>
</div>
<!--/ Source Visit -->
@endsection
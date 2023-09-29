@extends('layouts/master')
@section('title', 'Invoice & Pembayaran')
@section('content')
<div class="col-lg-12 mb-3">
    <div class="card h-100">
        <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
            <div class="card-title mb-0">
                <h5 class="mb-0">Resume <b>Tahun {{ $currentYears }}</b> </h5>
                <small class="text-muted"></small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                    <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        href="#">Filter</a>
                </div>
            </div>
            <!-- </div> -->
        </div>
        <div class="card-body mt-4">
            <div class="card-title mb-0">
                <h5 class="mb-0">
                </h5>
            </div>
            <div class=" p-3 mt-2">
                <div class="row gap-4 gap-sm-0">
                    <div class="col-12 col-sm-4">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-primary p-1">
                                <i class="ti ti-receipt ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Total Jumlah INV </h6>
                        </div>
                        <h4 class="my-2 pt-1">{{ $total_inv }}</h4>

                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-info p-1"><i class="ti ti-report-money ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Total Amount INV</h6>
                        </div>
                        <h4 class="my-2 pt-1"> Rp. {{ number_format($amount_inv, 0, ',', '.',)
                            }}</h4>

                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-primary p-1">
                                <i class="ti ti-align-box-bottom-center ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Nominal Penerimaan</h6>
                        </div>
                        <h4 class="my-2 pt-1">Rp. {{ number_format($penerimaan, 0, ',', '.',)
                            }}</h4>

                    </div>
                </div>
            </div>
            <div class=" p-3 mt-2">
                <div class="row gap-4 gap-sm-0">
                    <div class="col-12 col-sm-4">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-primary p-1">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Total POT. PPH 23</h6>
                        </div>
                        <h4 class="my-2 pt-1">Rp. {{ number_format($pph, 0, ',', '.',)
                            }} </h4>

                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i>
                            </div>
                            <h6 class="mb-0">Out Standing</h6>
                        </div>
                        <h4 class="my-2 pt-1">Rp. {{ number_format($os, 0, ',', '.',)
                            }}</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 mb-3 ">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">Statistic Invoice & Pembayaran <b>Tahun {{ $currentYears }}</b> </h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='5' style="text-align: center">No</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Total INV </th>
                            <th class="text-center">Total Amount INV Rp.</th>
                            <th class="text-center">Nominal Penerimaan Rp.</th>
                            <th class="text-center">Pot PPH 23 Rp.</th>
                            <th class="text-center">Out Standing Rp.</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td> 1</td>
                            <td>Januari</td>
                            <td>{{ $januari }}</td>
                            <td style="text-align: right">{{ number_format($januariCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($januariTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($januariDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($JanOS, 0, ',', '.',)
                                }}</td>

                        </tr>
                        <tr>
                            <td> 2</td>
                            <td>Februari</td>
                            <td>{{ $februari }}</td>
                            <td style="text-align: right">{{ number_format($februariCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($februariTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($februariDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($FebOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 3</td>
                            <td>Maret</td>
                            <td>{{ $maret }}</td>
                            <td style="text-align: right">{{ number_format($maretCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($maretTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($maretDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($MarOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 4</td>
                            <td>April</td>
                            <td>{{ $april }}</td>
                            <td style="text-align: right">{{ number_format($aprilCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($aprilTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($aprilDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($aprOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 5</td>
                            <td>Mei</td>
                            <td>{{ $mei }}</td>
                            <td style="text-align: right">{{ number_format($meiCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($meiTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($meiDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($meiOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 6</td>
                            <td>Juni</td>
                            <td>{{ $juni }}</td>
                            <td style="text-align: right">{{ number_format($juniCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juniTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juniDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juniOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 7</td>
                            <td>Juli</td>

                            <td>{{ $juli }}</td>
                            <td style="text-align: right">{{ number_format($juliCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juliTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juliDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($juliOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 8</td>
                            <td>Agustus</td>
                            <td>{{ $agustus }}</td>
                            <td style="text-align: right">{{ number_format($agustusCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($agustusTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($agustusDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($agustusOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>September</td>
                            <td>{{ $september }}</td>
                            <td style="text-align: right">{{ number_format($septemberCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($septemberTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($septemberDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($septemberOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 10</td>
                            <td>Oktober</td>
                            <td>{{ $oktober }}</td>
                            <td style="text-align: right">{{ number_format($oktoberCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($oktoberTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($oktoberDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($oktoberOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 11</td>
                            <td>November</td>
                            <td>{{ $november }}</td>
                            <td style="text-align: right">{{ number_format($novemberCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($novemberTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($novemberDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($novemberOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                        <tr>
                            <td> 12</td>
                            <td>Desember </td>
                            <td>{{ $desember }}</td>
                            <td style="text-align: right">{{ number_format($desemberCount, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($desemberTot, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($desemberDeduc, 0, ',', '.',)
                                }}</td>
                            <td style="text-align: right">{{ number_format($desemberOS, 0, ',', '.',)
                                }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Filter Data Tahun</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" action="{{ route('laporan.getLaporan.getYears') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Tahun</label>
                <input type="text" class="form-control" id="add-user-fullname" name="from" placeholder="Ex. 2023"
                    required />
            </div>
            <button type="reset" class="btn btn-label-secondary me-sm-3 me-1"
                data-bs-dismiss="offcanvas">Cancel</button>
            <button type="submit" class="btn btn-primary data-submit">Submit</button>
        </form>
    </div>
</div>
@endsection
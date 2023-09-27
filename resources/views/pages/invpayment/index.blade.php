@extends('layouts/master')
@section('title', 'Invoice & Pembayaran')
@section('content')
<div class="col-lg-12">

    <div class="row">
        <!-- Website Analytics -->
        <div class="col-lg-6 mb-4">
            <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden"
                id="swiper-with-pagination-cards">
                <div class="swiper-wrapper" id="swiper-wrapper-3470b9c10854e10ea5" aria-live="off"
                    style="transform: translate3d(-656px, 0px, 0px); transition-duration: 0ms;" style="height: 800px">
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                        data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 328px;">
                        <div class="row" style="height: 290px">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                <small>Total 28.5% Conversion Rate</small>
                            </div>
                            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                <h6 class="text-white mt-0 mt-md-3 mb-3">Revenue Sources</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">268</p>
                                                <p class="mb-0">Direct</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">62</p>
                                                <p class="mb-0">Referral</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">890</p>
                                                <p class="mb-0">Organic</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                                                <p class="mb-0">Campaign</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                <img src="{{ asset('assets/img/illustrations/card-website-analytics-3.png') }}"
                                    alt="Website Analytics" width="170" class="card-website-analytics-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group"
                        aria-label="1 / 3" style="width: 328px;">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                <small>Total 28.5% Conversion Rate</small>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                    <h6 class="text-white mt-0 mt-md-3 mb-3">Traffic</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">28%</p>
                                                    <p class="mb-0">Sessions</p>
                                                </li>
                                                <li class="d-flex align-items-center mb-2">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                                                    <p class="mb-0">Leads</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">3.1k</p>
                                                    <p class="mb-0">Page Views</p>
                                                </li>
                                                <li class="d-flex align-items-center mb-2">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">12%</p>
                                                    <p class="mb-0">Conversions</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                    <img src="{{ asset('assets/img/illustrations/card-website-analytics-1.png') }}"
                                        alt="Website Analytics" width="170" class="card-website-analytics-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" role="group"
                        aria-label="2 / 3" style="width: 328px;">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                <small>Total 28.5% Conversion Rate</small>
                            </div>
                            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                <h6 class="text-white mt-0 mt-md-3 mb-3">Spending</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">12h</p>
                                                <p class="mb-0">Spend</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">127</p>
                                                <p class="mb-0">Order</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">18</p>
                                                <p class="mb-0">Order Size</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">2.3k</p>
                                                <p class="mb-0">Items</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                <img src="{{ asset('assets/img/illustrations/card-website-analytics-2.png') }}"
                                    alt="Website Analytics" width="170" class="card-website-analytics-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" role="group"
                        aria-label="3 / 3" style="width: 328px;">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                <small>Total 28.5% Conversion Rate</small>
                            </div>
                            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                <h6 class="text-white mt-0 mt-md-3 mb-3">Revenue Sources</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">268</p>
                                                <p class="mb-0">Direct</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">62</p>
                                                <p class="mb-0">Referral</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex mb-4 align-items-center">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">890</p>
                                                <p class="mb-0">Organic</p>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                                                <p class="mb-0">Campaign</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                <img src="../../assets/img/illustrations/card-website-analytics-3.png"
                                    alt="Website Analytics" width="170" class="card-website-analytics-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                        data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 328px;">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                                <small>Total 28.5% Conversion Rate</small>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                                    <h6 class="text-white mt-0 mt-md-3 mb-3">Traffic</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">28%</p>
                                                    <p class="mb-0">Sessions</p>
                                                </li>
                                                <li class="d-flex align-items-center mb-2">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                                                    <p class="mb-0">Leads</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex mb-4 align-items-center">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">3.1k</p>
                                                    <p class="mb-0">Page Views</p>
                                                </li>
                                                <li class="d-flex align-items-center mb-2">
                                                    <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">12%</p>
                                                    <p class="mb-0">Conversions</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                                    <img src="../../assets/img/illustrations/card-website-analytics-1.png"
                                        alt="Website Analytics" width="170" class="card-website-analytics-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <span class="swiper-pagination-bullet" tabindex="0" role="button"
                        aria-label="Go to slide 1"></span><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                        aria-label="Go to slide 2" aria-current="true"></span><span class="swiper-pagination-bullet"
                        tabindex="0" role="button" aria-label="Go to slide 3"></span>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <!--/ Website Analytics -->

        <!-- Sales Overview -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card">
                <h5 class="card-header">Basic </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <form action="{{ route('OStore') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="from" class="mb-2">OS Sampai Kemaren (Rp.)</label>
                                        <input type="text" id="tanpa-rupiah2" name="os_sampai_kemarin"
                                            class="form-control" placeholder="Enter" required />

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="from" class="mb-2">Penyesuaian Invoice (Rp.)</label>
                                        <input type="text" id="tanpa-rupiah4" name="pe_invoice" class="form-control"
                                            placeholder="Enter" required />

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="from" class="mb-2">OS Hari Ini (Rp.)</label>
                                        <input type="text" id="tanpa-rupiah5" name="os_hari_ini" class="form-control"
                                            placeholder="Enter" required />

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="from" class="mb-2">Potongan (Rp.)</label>
                                        <input type="text" id="tanpa-rupiah6" name="pot" class="form-control"
                                            placeholder="Enter" required />

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="from" class="mb-2">Pembayaran Hari Ini (Rp.)</label>
                                        <input type="text" id="tanpa-rupiah8" name="pem_hari_ini" class="form-control"
                                            placeholder="Enter" required />

                                    </div>
                                    <div class="col-sm-6 mt-4 ">
                                        <label for="from" class="mb-2"></label> <button
                                            type="submit" class="btn btn-primary float-end mt-4">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 3</td>
                            <td>Maret</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 4</td>
                            <td>April</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 5</td>
                            <td>Mei</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 6</td>
                            <td>Juni</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 7</td>
                            <td>Juli</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 8</td>
                            <td>Agustus</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 9</td>
                            <td>September</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 10</td>
                            <td>Oktober</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 11</td>
                            <td>November</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> 12</td>
                            <td>Desember </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-8 mb-3">
    <div class="card">
        <h5 class="card-header">Basic </h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <form action="{{ route('OStore') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="from" class="mb-2">OS Sampai Kemaren (Rp.)</label>
                                <input type="text" id="tanpa-rupiah2" name="os_sampai_kemarin" class="form-control"
                                    placeholder="Enter" required />

                            </div>
                            <div class="col-sm-6">
                                <label for="from" class="mb-2">Penyesuaian Invoice (Rp.)</label>
                                <input type="text" id="tanpa-rupiah4" name="pe_invoice" class="form-control"
                                    placeholder="Enter" required />

                            </div>
                            <div class="col-sm-6">
                                <label for="from" class="mb-2">OS Hari Ini (Rp.)</label>
                                <input type="text" id="tanpa-rupiah5" name="os_hari_ini" class="form-control"
                                    placeholder="Enter" required />

                            </div>
                            <div class="col-sm-6">
                                <label for="from" class="mb-2">Potongan (Rp.)</label>
                                <input type="text" id="tanpa-rupiah6" name="pot" class="form-control"
                                    placeholder="Enter" required />

                            </div>
                            <div class="col-sm-6">
                                <label for="from" class="mb-2">Pembayaran Hari Ini (Rp.)</label>
                                <input type="text" id="tanpa-rupiah8" name="pem_hari_ini" class="form-control"
                                    placeholder="Enter" required />

                            </div>
                            <div class="col-xl-12 ">
                                <label for="to" class="mb-2"></label>
                                <button type="submit" class="btn btn-primary float-end mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Basic Custom Radios -->

<!-- Basic Custom Checkboxes -->
<div class="col-xl-4 mb-3">
    <div class="card">
        <h5 class="card-header">Report Data Invoice & Pembayaran</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <form action="{{ route('laporan.getLaporan.InvPayment') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="from" class="mb-2">Start Date</label>
                                <input type="text" name="from" class="form-control" placeholder="Start Date"
                                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">

                            </div>
                            <div class="col-sm-12">
                                <label for="from" class="mb-2">End Date</label>
                                <input type="text" name="to" class="form-control" placeholder="End Date"
                                    onfocusin="(this.type='date')" onfocusout="(this.type='text')">

                            </div>

                            <div class="col-sm-12">
                                <label for="from" class="mb-2">Kategori</label>
                                <select class="form-select" id="selectDefault" name="kat" required>
                                    <option selected>Open this select</option>
                                    <option value="date_invoice">TGL INV</option>
                                    <option value="due_date">TGL JATUH TEMPO</option>
                                    <option value="paid_date">TGL PENERIMAAN</option>
                                </select>

                            </div>
                            <div class="col-xl-12 ">
                                <label for="to" class="mb-2"></label>
                                <button type="submit" class="btn btn-primary float-end mt-2">Cari Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 ">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Invoice & Pembayaran</h5>
                </div>
                <div class="col-auto mt-1">
                    {{-- <button class="btn btn-secondary add-new btn-success" tabindex="0"
                        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasAddUser"><span><span class="d-none d-sm-inline-block ">Import
                                Excel</span></span></button> --}}

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Filter
                    </button>

                    <a href="{{ route('invpayment.create') }}" class="btn btn-primary me-2">Create</a>
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
                            <td width='50px'>
                                @switch($user)
                                @case($user->no_project == null)
                                @break
                                @default
                                {{$user->no_project}}
                                @endswitch

                            </td>
                            <td width='50px'>

                                @switch($user)
                                @case($user->pic_client == null)
                                @break
                                @default
                                {{$user->pic_client}}
                                @endswitch
                            </td>
                            <td width='50px'>

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
                            <td width='50px'>
                                @switch($user)
                                @case($user->date_invoice == null)
                                @break
                                @default
                                {{-- {{$user->date_invoice}} --}}

                                {{ \Carbon\Carbon::parse($user->date_invoice)->format('d-m-Y') }}

                                @endswitch

                            </td>
                            <td width='50px' style="text-align: right">

                                @switch($user)
                                @case($user->amount_invoice == null)
                                @break
                                @default
                                {{ number_format($user->amount_invoice, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td width='50px'>

                                @switch($user)
                                @case($user->due_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->due_date)->format('d-m-Y') }}
                                @endswitch
                            </td>
                            <td width='50px' style="text-align: right">

                                @switch($user)
                                @case($user->payment_in == null)
                                @break
                                @default
                                {{ number_format($user->payment_in, 0, ',', '.') }}
                                @endswitch

                            </td>
                            <td width='50px'>
                                @switch($user)
                                @case($user->paid_date == null)
                                @break
                                @default
                                {{ \Carbon\Carbon::parse($user->paid_date)->format('d-m-Y') }}

                                @endswitch
                            </td>
                            <td width='50px' style="text-align: right">
                                @switch($user)
                                @case($user->deduction == null)
                                @break
                                @default
                                {{ number_format($user->deduction, 0, ',', '.') }}
                                @endswitch
                            </td>
                            <td width='50px'>
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
                    @foreach ($latestData as $item)
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">OS Sampai Kemaren </td>
                        <td style="color:black; background-color:rgb(228, 228, 80);text-align :right">{{
                            number_format($item->os_sampai_kemarin, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Penyesuaian Invoice </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pe_invoice, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">OS Hari Ini </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->os_hari_ini, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Potongan </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pot, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">Pembayaran Hari Ini </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">{{
                            number_format($item->pem_hari_ini, 0, ',',
                            '.') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="color:black; background-color:rgb(228, 228, 80)">ABC - Total OS </td>
                        <td style="color:black; background-color:rgb(228, 228, 80) ;text-align :right">os</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
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
                <input type="text" class="form-control" id="add-user-fullname" name="from" placeholder="Ex. 2023" />
            </div>
            <button type="reset" class="btn btn-label-secondary me-sm-3 me-1"
                data-bs-dismiss="offcanvas">Cancel</button>
            <button type="submit" class="btn btn-primary data-submit">Submit</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Name</label>
                        <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Email</label>
                        <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobWithTitle" class="form-label">DOB</label>
                        <input type="date" id="dobWithTitle" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

<script>
    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function (e) {
        tanpa_rupiah2.value = formatRupiah2(this.value);
    });

    /* Fungsi */
    function formatRupiah2(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
    tanpa_rupiah4.addEventListener('keyup', function (e) {
        tanpa_rupiah4.value = formatRupiah4(this.value);
    });

    /* Fungsi */
    function formatRupiah4(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah5 = document.getElementById('tanpa-rupiah5');
    tanpa_rupiah5.addEventListener('keyup', function (e) {
        tanpa_rupiah5.value = formatRupiah5(this.value);
    });

    /* Fungsi */
    function formatRupiah5(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah6 = document.getElementById('tanpa-rupiah6');
    tanpa_rupiah6.addEventListener('keyup', function (e) {
        tanpa_rupiah6.value = formatRupiah6(this.value);
    });

    /* Fungsi */
    function formatRupiah6(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah7 = document.getElementById('tanpa-rupiah7');
    tanpa_rupiah7.addEventListener('keyup', function (e) {
        tanpa_rupiah7.value = formatRupiah7(this.value);
    });

    /* Fungsi */
    function formatRupiah7(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah8 = document.getElementById('tanpa-rupiah8');
    tanpa_rupiah8.addEventListener('keyup', function (e) {
        tanpa_rupiah8.value = formatRupiah8(this.value);
    });

    /* Fungsi */
    function formatRupiah8(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $(document).ready(function () {
        // Format mata uang.
        $('#uang').mask('000.000.000', {
            reverse: true
        });
    })
</script>
@endsection
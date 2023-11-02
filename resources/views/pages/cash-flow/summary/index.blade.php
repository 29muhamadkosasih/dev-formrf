@extends('layouts/master')
@section('title', 'Summary')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto me-auto ">
                    <h5 class="fs-5 text-left">Resume</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('summary.pdf') }}" class="btn btn-primary btn-sm" target="_blank"><svg
                            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                            </path>
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                            </path>
                        </svg> &nbsp; PDF </a>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Tanggal</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">Cash
                                /<br> BANK</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Overbooking 899 <br> to 893 (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Overbooking 893 <br> to 899 (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Total <br> Overbooking (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Revenue <br> And Sales</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Expanses <br> (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Outstanding <br> (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Profit <br> / loss (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resume as $item)
                        <tr>
                            <td style="text-align: center">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F
                                Y') }}
                            </td>
                            <td style="text-align: right"> {{
                                number_format($item->resume_cash_bank, 2, ',', '.')??
                                0 }}

                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_ovb_899_893, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_ovb_893_899, 2, ',', '.')??
                                0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_total_ovb, 2, ',', '.')?? 0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_revenue_sales, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_expanses, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_outstanding, 2, ',', '.')??
                                0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->resume_profit_los, 2, ',', '.')??
                                0
                                }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <p class="mt-2"> <b>Keterangan :</b> <br>
                    Resume CASH AND BANK = Cash & Bank Kemarin + Cash & Bank Hari Ini <br>
                    Resume OVERBOOKING 899 TO 893 (RP.) = OVB 899 to 893 Kemarin + OVB 899 to 893 Today<br>
                    Resume OVERBOOKING 893 TO 899 (RP.) = OVB 893 to 899 Kemarin + OVB 893 to 899 Today<br>
                    Resume TOTAL OVERBOOKING (RP.)= OVB 899 To 893 + OVB To 893 To 899<br>
                    Resume REVENUE AND SALES = Revenue / Sales Kemarin + Revenue / Sales Today<br>
                    Resume EXPANSES (RP.) = Arus Kas Keluar + Arus Kas Today<br>
                    Resume OUTSTANDING (RP.) = jumlah kemarin outstanding - adjusment invoice + invoice out - tax 23
                    - paid today<br>
                    Resume PROFIT / LOSS (RP.) = (Arus Kas Masuk Kemarin + Arus Kas Masuk Today ) - (Arus Kas Keluar
                    Kemarin + Arus Kas Keluar Today)<br>
                </p>
            </div>

            <h5 class="fs-5 text-left mt-4">Rasio</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Tanggal</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">Cash
                                /<br> Bank</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Outstanding <br> (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Total <br> (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Total a/e <br> Revenue (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Total Account <br> Payable</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Rasio <br> (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Rasio Until <br> 6th month (Rp.)</th>
                            <th width="200px" class="text-center" style="vertical-align: middle; text-align:center">
                                Rasio Bulan <br> berdasarkan <br> rata-rata
                                expense <br> (750.000.000/bulan) <br> (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rasio as $item)

                        <tr>
                            <td style="text-align: center">{{
                                \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F
                                Y') }}
                            </td>
                            <td style="text-align: right">
                                {{
                                number_format($item->rasio_cash_bank, 2, ',', '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_outstanding, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_total, 2, ',', '.')??
                                0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_total_revenue, 2, ',',
                                '.')?? 0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_account_payable, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_rasio, 2, ',',
                                '.')??
                                0 }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($item->rasio_until_6_month, 2, ',',
                                '.')??
                                0
                                }}
                            </td>
                            <td style="text-align: right">
                                {{$item->rasio_rata_rata_expense}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="mt-2"> <b>Keterangan :</b> <br>
                    Rasio Cash And Bank = Total Resume Cash and Bank <br>
                    Rasio Outstanding = Total Resume Outstanding<br>
                    Rasio Total = Total Resume Cash and Bank + Total Resume Outstanding<br>
                    Rasio Total a/e Revenue= Hasil Input Data Manual<br>
                    Rasio Total Account Payable = Hasil Input Data Manual<br>
                    Rasio Rasio = Rasio Total + Total a/e Revenue + Totak Account Payable<br>
                    Rasio Rasio Until 6th month = Hasil penjumlahan Rasio dibagi (/) 6 bulan<br>
                    Rasio Rasio Bulan berdasarkan rata-rata
                    expense(750.000.000/bulan) = Hasil penjumlahan Rasio /750.000.000 <br>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
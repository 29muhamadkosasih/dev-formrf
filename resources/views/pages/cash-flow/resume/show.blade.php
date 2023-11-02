@extends('layouts/master')
@section('title', 'Resume')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            </h5>
            <div class="row mb-3" style="text-align right">
                <div class="col-auto me-auto ">
                    <h5 class="fs-5 text-left"></h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('resume.index') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="col-center">
                    <h4 class="fs-4 text-center">Daily Cash Flow Report</h4>
                    <h5 class="fs-5 text-center">{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                        Y') }}
                </div>
                <h5 class="fs-5 text-left">Cash & Bank</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Petty Cash</td>
                                <td style="text-align: right">{{ number_format($show->cb_petty_cash_kemarin, 2, ',',
                                    '.')?? 0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->cb_petty_cash, 2, ',', '.')?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bank Mandiri 7899 - Opr</td>
                                <td style="text-align: right">{{ number_format($show->cb_petty_cash_kemarin, 2, ',',
                                    '.')?? 0 }}
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_opr, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bank Mandiri 7893 - Giro</td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_giro_kemarin, 2, ',',
                                    '.')?? 0 }} </td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_giro, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bank Mandiri 7894 - LSP</td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_lsp_kemarin, 2, ',',
                                    '.')?? 0 }} </td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_lsp, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bank Mandiri 1176 - Batam</td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_batam_kemarin, 2, ',',
                                    '.')?? 0 }} </td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_batam, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bank Mandiri 7897 - Cadangan</td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_cadangan_kemarin, 2,
                                    ',',
                                    '.')?? 0 }} </td>
                                <td style="text-align: right">{{ number_format($show->cb_mandiri_cadangan, 2, ',',
                                    '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr style="background-color: skyblue">
                                <td style="text-align: right" colspan="1">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->cb_total_kemarin, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->cb_total_today, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="fs-5 text-left mt-4">Revenue & Sales</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                                <th width="200px" class="text-center">TOTAL (RP.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah Revenue / Sales</td>
                                <td style="text-align: right"> {{ number_format($show->rs_total_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->rs_total_today, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right"> {{ number_format($show->rs_total, 2, ',', '.')?? 0 }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-1"> * Total = jumlah kemarin + jumlah hari ini
                    </p>
                </div>

                <h5 class="fs-5 text-left mt-4">SALES OUTSTANDING / PIUTANG</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                                <th width="200px" class="text-center">TOTAL (RP.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Outstanding</td>
                                <td style="text-align: right">
                                    {{ number_format($show->so_outstanding_kemarin, 2, ',', '.')?? 0 }}
                                </td>
                                <td style="text-align: right">
                                </td>
                                <td style="text-align: right"> {{
                                    number_format($show->so_outstanding_total, 2, ',',
                                    '.')?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td>Adjusment Invoice</td>
                                <td style="text-align: right">
                                </td>
                                <td style="text-align: right"> {{ number_format($show->so_adjusment_invoice, 2, ',',
                                    '.')?? 0 }}
                                </td>
                                <td style="text-align: right">
                                </td>
                            <tr>
                                <td>Outstanding Today (Invoice Out)</td>
                                <td style="text-align: right">
                                </td>
                                <td style="text-align: right"> {{ number_format($show->so_invoice_out, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                </td>
                            <tr>
                                <td>Prepaid Tax Art 23</td>
                                <td style="text-align: right">
                                </td>
                                <td style="text-align: right"> {{ number_format($show->so_prepaid_tax, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                </td>
                            <tr>
                                <td>Paid Today</td>
                                <td style="text-align: right">
                                </td>
                                <td style="text-align: right"> {{ number_format($show->so_paid_today, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <p class="mt-1"> * Total = jumlah kemarin outstanding - adjusment invoice + invoice out - tax 23
                            - paid today
                        </p>
                    </div>
                </div>

                <h5 class="fs-5 text-left mt-2">Overbooking / Pindah Buku</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>899 To 893</td>
                                <td style="text-align: right"> {{ number_format($show->pb_899_893_kemarin, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->pb_899_893, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->pb_total_899_893, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>893 To 899</td>
                                <td style="text-align: right"> {{ number_format($show->pb_893_899_kemarin, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->pb_893_899, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->pb_total_893_899, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-1"> * Total = jumlah kemarin + jumlah hari ini
                    </p>
                </div>

                <h5 class="fs-5 text-left mt-4">Arus Kas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total arus kas masuk</td>
                                <td style="text-align: right"> {{ number_format($show->ak_masuk_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_masuk, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_total_masuk, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>Total arus kas keluar</td>
                                <td style="text-align: right"> {{ number_format($show->ak_keluar_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_keluar, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_total_keluar, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-1"> * Total = jumlah kemarin + jumlah hari ini
                    </p>
                </div>

                <h5 class="fs-5 text-left mt-4">Resume</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">Cash And BANK</th>
                                <th width="200px" class="text-center">Overbooking 899 to 893 (Rp.)</th>
                                <th width="200px" class="text-center">Overbooking 893 to 899 (Rp.)</th>
                                <th width="200px" class="text-center">Total Overbooking (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: right"> {{
                                    number_format($show->resume_cash_bank, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right"> {{ number_format($show->resume_ovb_899_893, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->resume_ovb_893_899, 2, ',', '.')??
                                    0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->resume_total_ovb, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">Revenue And Sales</th>
                                <th width="200px" class="text-center">Expanses (Rp.)</th>
                                <th width="200px" class="text-center">Outstanding (Rp.)</th>
                                <th width="200px" class="text-center">Profit / loss (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: right"> {{ number_format($show->resume_revenue_sales, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right"> {{ number_format($show->resume_expanses, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->resume_outstanding, 2, ',', '.')??
                                    0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->resume_profit_los, 2, ',', '.')??
                                    0
                                    }}
                                </td>
                            </tr>
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
                                <th width="200px" class="text-center">Cash And Bank</th>
                                <th width="200px" class="text-center">Outstanding (Rp.)</th>
                                <th width="200px" class="text-center">Total (Rp.)</th>
                                <th width="200px" class="text-center">Total a/e Revenue (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: right"> {{
                                    number_format($show->rasio_cash_bank, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right"> {{ number_format($show->rasio_outstanding, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->rasio_total, 2, ',', '.')??
                                    0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->rasio_total_revenue, 2, ',',
                                    '.')?? 0
                                    }}
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">Total Account Payable</th>
                                <th width="200px" class="text-center">Rasio (Rp.)</th>
                                <th width="200px" class="text-center">Rasio Until 6th month (Rp.)</th>
                                <th width="200px" class="text-center">Rasio Bulan berdasarkan rata-rata
                                    expense(750.000.000/bulan) (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: right"> {{ number_format($show->rasio_account_payable, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right"> {{ number_format($show->rasio_rasio, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->rasio_until_6_month, 2, ',',
                                    '.')??
                                    0
                                    }}
                                </td>
                                <td style="text-align: right">{{$show->rasio_rata_rata_expense}}
                                </td>
                            </tr>
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

<!DOCTYPE html>

<head>
    <title>Daily Cash Flow Report
    </title>
    <meta charset="utf-8" <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'DejaVuSans', sans-serif;
            font-size: 14px;
            margin: 0;
            margin-bottom: 2px;
        }

        #judul {
            text-align: left;
            font-family: sans-serif;
        }

        #ping {
            border-spacing: 0px;
            border-collapse: separate;
            border: 1px solid black;
        }

        @page {
            size: A4 potrait;
            margin: 20px;
            /* 1 cm dalam piksel */
        }
    </style>
</head>

<body>
    <div id="halaman">
        <h3 style="text-align: center">Daily Cash Flow Report</h3>
        <h4 style="text-align: center">{{ \Carbon\Carbon::parse($data->tgl_resume)->translatedFormat('l, j F
            Y') }}</h4>
        <table class="table" border="1" id="ping">
            <thead>
                <tr style="background-color: skyblue">
                    <th width="184pxpx">Deskripsi</th>
                    <th width="184pxpx">Jumlah Kemarin</th>
                    <th width="184pxpx">Jumlah Hari Ini </th>
                    <th width="184pxpx">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Cash &amp;
                            Bank</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Petty Cash</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_petty_cash_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_petty_cash, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Bank Mandiri 7899 - Opr</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_opr_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_op, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Bank Mandiri 7893 - Giro</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_giro_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_giro, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Bank Mandiri 7894 - LSP</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_lsp_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_lsp, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Bank Mandiri 1176 - Batam</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_batam_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_batam, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Bank Mandiri 7897 - Cadangan
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_cadangan_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->cb_mandiri_cadangan, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
            </tbody>
            <tbody>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Revenue And
                            Sales</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Jumlah Revenue / Sales</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rs_total_kemarin, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rs_total_today, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rs_total, 2, ',',
                        '.')?? 0 }}</td>
                </tr>
            </tbody>
            <tbody>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Sales
                            Outstanding / Piutang</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Outstanding</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_outstanding_kemarin, 2, ',', '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_outstanding_total, 2, ',',
                        '.')?? 0 }}</td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Adjusment Invoice</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_adjusment_invoice, 2, ',',
                        '.')?? 0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Outstanding Today (Invoice Out)
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_invoice_out, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Prepaid Tax Art 23</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_prepaid_tax, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Paid Today</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->so_paid_today, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"></td>
                </tr>
            </tbody>
            <tbody>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Overbooking /
                            Pindah Buku</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">899 To 893</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_899_893_kemarin, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_899_893, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_total_899_893, 2, ',', '.')?? 0
                        }}</td>
                </tr>

                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">893 To 899</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_893_899_kemarin, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_893_899, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->pb_total_893_899, 2, ',', '.')?? 0
                        }}</td>
                </tr>
            </tbody>
            <tbody>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Arus Kas</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Total arus kas masuk</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_masuk_kemarin, 2, ',', '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_masuk, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_total_masuk, 2, ',', '.')?? 0
                        }}</td>
                </tr>

                <tr>
                    <td style="text-align: left;padding-left: 5px; padding-right: 5px;">Total arus kas keluar</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_keluar_kemarin, 2, ',', '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_keluar, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->ak_total_keluar, 2, ',', '.')?? 0
                        }}</td>
                </tr>
            </tbody>
            <thead>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Resume</b>
                    </td>
                </tr>
                <tr style="background-color: skyblue">
                    <th width="184pxpx" class="text-center">Cash <br> Bank</th>
                    <th width="184pxpx" class="text-center">Overbooking 899 <br> to 893</th>
                    <th width="184pxpx" class="text-center">Overbooking 893 <br> to 899</th>
                    <th width="184pxpx" class="text-center">Total <br> Overbooking</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->resume_cash_bank, 2, ',', '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->resume_ovb_899_893, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->resume_ovb_893_899, 2, ',', '.')??
                        0
                        }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->resume_total_ovb, 2, ',', '.')?? 0
                        }}
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr style="background-color: skyblue">
                    <th width="184pxpx" class="text-center">Revenue <br> Sales</th>
                    <th width="184pxpx" class="text-center">Expanses</th>
                    <th width="184pxpx" class="text-center">Outstanding</th>
                    <th width="184pxpx" class="text-center">Profit <br> / loss</th>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->resume_revenue_sales, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->resume_expanses, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->resume_outstanding, 2, ',', '.')??
                        0
                        }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->resume_profit_los, 2, ',', '.')??
                        0
                        }}
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr style="background-color: skyblue">
                    <td colspan="4" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>Rasio</b>
                    </td>
                </tr>
                <tr style="background-color: skyblue">
                    <th width="184px" class="text-center">Cash And Bank</th>
                    <th width="184px" class="text-center">Outstanding </th>
                    <th width="184px" class="text-center">Total </th>
                    <th width="184px" class="text-center">Total a/e Revenue </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->rasio_cash_bank, 2, ',', '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->rasio_outstanding, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rasio_total, 2, ',', '.')??
                        0
                        }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rasio_total_revenue, 2, ',',
                        '.')?? 0
                        }}
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr style="background-color: skyblue">
                    <th width="184px" class="text-center">Total Account Payable</th>
                    <th width="184px" class="text-center">Rasio </th>
                    <th width="184px" class="text-center">Rasio Until 6th month </th>
                    <th width="184px" class="text-center">Rasio Bulan berdasarkan rata-rata
                        expense(750.000.000/bulan) </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->rasio_account_payable, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;"> {{
                        number_format($data->rasio_rasio, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">{{
                        number_format($data->rasio_until_6_month, 2, ',',
                        '.')??
                        0
                        }}
                    </td>
                    <td style="text-align: right;padding-left: 5px; padding-right: 5px;">
                        {{$data->rasio_rata_rata_expense}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>


</html>

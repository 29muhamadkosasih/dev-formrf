<!DOCTYPE html>

<head>
    <title>SUMMARY
    </title>
    <meta charset="utf-8" <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'DejaVuSans', sans-serif;
            font-size: 10px;
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
            size: A4 landscape;
            margin: 20px;
            ;
            /* 1 cm dalam piksel */
        }
    </style>
</head>

<body>
    <div id="halaman">
        <table class="table" border="1" id="ping">
            <thead>
                <tr style="background-color: skyblue">
                    <td colspan="9" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>RESUME</b>
                    </td>
                </tr>
                <tr style="background-color: skyblue">
                    <th width="80px">Tanggal</th>
                    <th width="120px">Cash <br> Bank</th>
                    <th width="120px">Overbooking <br> 899 to 893</th>
                    <th width="120px">Overbooking <br> 893 to 899</th>
                    <th width="120px">Total <br> Overbooking</th>
                    <th width="120px">Revenue <br> And Sales</th>
                    <th width="120px">Expanses</th>
                    <th width="120px">Outstanding</th>
                    <th width="120px">Profit <br> / Loss</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resume as $item)
                <tr>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($item->tgl_resume)->translatedFormat('l, j F
                        Y') }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_cash_bank, 2, ',', '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_ovb_899_893, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_ovb_893_899, 2, ',', '.')??
                        0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_total_ovb, 2, ',', '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_revenue_sales, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_expanses, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_outstanding, 2, ',', '.')??
                        0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->resume_profit_los, 2, ',', '.')??
                        0
                        }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <table class="table" border="1" id="ping">
            <thead>
                <tr style="background-color: skyblue">
                    <td colspan="9" style="text-align: left;padding-left: 5px; padding-right: 5px;"> <b>RASIO</b>
                    </td>
                </tr>
                <tr style="background-color: skyblue">
                    <th width="80px">Tanggal</th>
                    <th width="120px">Cash <br> Bank</th>
                    <th width="120px">Outstanding</th>
                    <th width="120px">Total</th>
                    <th width="120px">Total <br> A/e Revenue</th>
                    <th width="120px">Total <br> Account Payable</th>
                    <th width="120px">Rasio</th>
                    <th width="120px">Rasio Until <br> 6th month</th>
                    <th width="120px">Rasio Bulan <br> berdasarkan <br> rata-rata <br>
                        expense <br> (750.000.000/bulan)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rasio as $item)
                <tr>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($item->tgl_resume)->translatedFormat('l, j F
                        Y') }}</td>
                    <td style="text-align: right ;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_cash_bank, 2, ',', '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;">{{
                        number_format($item->rasio_outstanding, 2, ',',
                        '.')??
                        0 }}
                    </td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_total, 2, ',', '.')??
                        0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_total_revenue, 2, ',',
                        '.')?? 0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_account_payable, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_rasio, 2, ',',
                        '.')??
                        0 }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;"> {{
                        number_format($item->rasio_until_6_month, 2, ',',
                        '.')??
                        0
                        }}</td>
                    <td style="text-align: right;padding-left: 2px; padding-right: 2px;">
                        {{$item->rasio_rata_rata_expense}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>

<!DOCTYPE html>
<html>

<head>

    <title>DAFTAR PENGELUARAN DANA HARIAN</title>
    <style type=”text/css”>
        table {

            border-spacing: 0px;
            border-collapse: separate;
            font-family: sans-serif;
            font-size: 12px;
            width: 100%;
            max-width: 600px;
            margin: 15px auto;
            font-family: sans-serif;
            width: 100%;
            max-width: 600px;
            margin: 20px auto;

        }

        #judul {
            text-align: center;
            font-family: sans-serif;
            font-size: 13px;
        }
    </style>

</head>

<body>
    <header>
        <table>
            <thead>
                <tr>
                    <td><img src="{{ asset('https://sisfo.bnsp.go.id/images/K8cRm4d6SGTrLQXefW3ON0JsIYM5ioPH.png') }}"
                            width="80"></td>
                    {{-- <img src="{{ asset('assets/img/favicon/lgo.png') }}" alt="" style="width: 90"> --}}
                    <td>
                        <h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; DAFTAR
                            PENGELUARAN DANA HARIAN </h3>
                        <h4> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <b>
                                {{ \Carbon\Carbon::parse($date)->translatedFormat('l, j F Y') }}
                            </b>
                        </h4>
                    </td>
                </tr>
            </thead>
        </table>
    </header>
    <table align=”center” border=”1″>
        <tr style="background-color: skyblue">
            <th width='80px' style="text-align: center">No RF</th>
            <th>Dari</th>
            <th>Payment <br> Method</th>
            <th>Bank</th>
            <th>No <br> Rekening</th>
            <th>Nama <br> Penerima</th>
            <th>Jumlah (Rp)</th>
        </tr>
        @forelse ($form as $data)
        <tr>
            <td style="text-align: center">{{ $data->no_rf}}</td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                {{ $data->user->name }}
            </td>

            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                {{ $data->payment }}
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->bank->nama_bank }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">

                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->no_rekening }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">

                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->nama_penerima }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse

        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Cash</th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_total, 0,
                ',',
                '.') }}</td>
        </tr>
        @forelse ($form2 as $data)
        <tr>
            <td style="text-align: center">{{ $data->no_rf}}</td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                {{ $data->user->name }}
            </td>

            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                {{ $data->payment }}
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->bank->nama_bank }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">

                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->no_rekening }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">

                @switch($data)
                @case($data->payment == 'Transfer')
                {{ $data->norek->nama_penerima }}
                @break
                @default
                <span class="badge bg-info">
                    <i data-feather='dollar-sign'></i>
                    Cash
                </span>
                @endswitch
            </td>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Transfer </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_total2, 0,
                ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Biaya Transfer
            </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_admin, 0,
                ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;">Jumlah Total </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_akhir, 0,
                ',',
                '.') }}</td>
        </tr>
        @foreach ($latestData as $item)
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;"> Total Saldo 899</th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{
                number_format($item->jumlah_saldo_899,
                0, ',',
                '.') }}</td>
        </tr>

        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;"> Total Saldo 893</th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{
                number_format($item->jumlah_saldo_893,
                0, ',',
                '.') }}</td>
        </tr>

        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px;"> Total Petty Cash</th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->p_cash,
                0, ',',
                '.') }}</td>
        </tr>
        @endforeach

        @foreach ($latestData2 as $item)
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px; "> Total Penarikan Uang
                Kas </th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->p_uang_kas,
                0, ',',
                '.') }}</td>
        </tr>

        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px; "> Total PB 899-893 </th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->a_b, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="6" style="text-align :right;padding-left: 10px; padding-right: 10px; "> Total PB 893-899 </th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->b_a, 0, ',',
                '.') }}</td>
        </tr>
        @endforeach
    </table>
    <div style="width: 35%; text-align: left; float: right;font-family: sans-serif;">Persetujuan,</div>
    <div style="width: 30%; text-align: left; float: right;"> </div>
    <div style="width: 40%; text-align: left; float: right;"> </div><br><br><br>
    <div style="width: 30%; text-align: left; float: right;"></div>
    <div style="width: 30%; text-align: left; float: right;"></div>
    <div style="width: 40%; text-align: left; float: right;"></div><br><br> <br>
    <div style="width: 35%; text-align: left; float: right;font-family: sans-serif;">Direktur Utama</div>
    <div style="width: 30%; text-align: left; float: right;"></div>
    <br>
    <br>
    <br>
    <br>
</body>

</html>

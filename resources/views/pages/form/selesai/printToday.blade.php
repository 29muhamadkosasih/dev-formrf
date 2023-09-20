<!DOCTYPE html>
<html>

<head>

    <title>FUND REQUEST FORM</title>
    <style type=”text/css”>
        table {

            border-spacing: 0px;
            border-collapse: separate;
            border: 1px solid black;
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
    <h3 id=judul>RESUME REQUEST FORM </h3>
    <h4 id=judul>Tanggal
        <b>
            {{ $currentDay}}
        </b>
    </h4>
    <table align=”center” border=”1″>
        <tr style="background-color: skyblue">
            <th width='80px' style="text-align: center">No RF</th>
            <th>Dari</th>
            <th>Payment Method</th>
            <th>Kategori
                Pengajuan</th>
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
                {{ $data->kpengajuan->name }} </td>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse

        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Cash</th>
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
                {{ $data->kpengajuan->name }} </td>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Transfer </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_total2, 0,
                ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Biaya Transfer
            </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_admin, 0,
                ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;">Jumlah Total </th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_akhir, 0,
                ',',
                '.') }}</td>
        </tr>
        @foreach ($latestData as $item)
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;"> Total Saldo 899</th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->jumlah_saldo,
                0, ',',
                '.') }}</td>
        </tr>
        @endforeach

        @foreach ($latestData2 as $item)
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px; "> PB 899-893 </th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->a_b, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px; "> PB 893-899 </th>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($item->b_a, 0, ',',
                '.') }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
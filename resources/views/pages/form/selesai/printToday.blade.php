<!DOCTYPE html>
<html>

<head>

    <title>FUND REQUEST FORM</title>



    <style type=”text/css”>
        table {

            border: 1px solid black;
            font-family: sans-serif;
            width: 100%;
            max-width: 600px;
            margin: 20px auto;

        }



        th {}



        tr:hover {

            background-color: yellow;

        }

        #judul {
            text-align: center;
            font-family: sans-serif;
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
            <th width='10px' style="text-align: center">No</th>
            <th>Dari</th>
            <th>Payment Method</th>
            <th>Kategori
                Pengajuan</th>
            <th>Jumlah (Rp)</th>
        </tr>
        @forelse ($form as $data)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>
                {{ $data->user->name }}
            </td>

            <td>
                {{ $data->payment }}
            </td>
            <td>
                {{ $data->kpengajuan->name }} </td>
            <td style="text-align :right ">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse

        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right ">Total Cash</th>
            <td style="text-align :right"> {{ number_format($jumlah_total, 0, ',',
                '.') }}</td>
        </tr>
        @forelse ($form2 as $data)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>
                {{ $data->user->name }}
            </td>

            <td>
                {{ $data->payment }}
            </td>
            <td>
                {{ $data->kpengajuan->name }} </td>
            <td style="text-align :right ">
                {{ number_format($data->jumlah_total, 0, ',', '.',) }}
            </td>
        </tr>
        @empty
        @endforelse
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right ">Total Transfer </th>
            <td style="text-align :right"> {{ number_format($jumlah_total2, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right ">Total Biaya Transfer </th>
            <td style="text-align :right"> {{ number_format($jumlah_admin, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right ">Jumlah Total </th>
            <td style="text-align :right"> {{ number_format($jumlah_akhir, 0, ',',
                '.') }}</td>
        </tr>
    </table>
</body>

</html>

<!DOCTYPE html>
<html>

<head>

    <title>PAID - REQUEST FORM</title>



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
    <h3 id=judul>PAID - REQUEST FORM </h3>
    <h4 id=judul>Tanggal
        <b>
            {{ \Carbon\Carbon::parse($from)->format('d-m-Y')}}
        </b>
        Sampai
        <b>
            {{ \Carbon\Carbon::parse($to)->format('d-m-Y')}}
        </b>
    </h4>
    <table align=”center” border=”1″>
        <tr style="background-color: skyblue">
            <th width='10px' style="text-align: center">No RF</th>
            <th width='300px'>Description</th>
            <th width='200px'>Nama Penerima</th>
            <th width='200px'>Jumlah Rp.</th>
        </tr>
        @foreach ($data as $data)
        <tr>
            <td style="text-align: center">{{ $data->no_rf}}</td>
            <td align=left>
                <ul>
                    <li>
                        {{ $data->description}}
                    </li>
                    @switch($data)
                    @case($data->description2 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description2}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description3 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description3}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description4 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description3}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description4 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description4}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description5 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description5}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description6 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description6}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description7 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description7}}
                    </li>
                    @endswitch @switch($data)
                    @case($data->description8 == NULL)
                    @break
                    @default
                    <li>
                        {{ $data->description8}}
                    </li>
                    @endswitch
                </ul>
            </td>
            <td style="text-align: center">{{ $data->user->name }}</td>
            <td style="text-align: right">{{ number_format($data->jumlah_total, 0, ',', '.',) }}</td>
        </tr>
        @endforeach
        <tr style="color:black; background-color: lightgreen">
            <th colspan="3" style="text-align :right ">Total Cash</th>
            <td style="text-align :right"> {{ number_format($jumlah_total, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="3" style="text-align :right ">Total Transfer </th>
            <td style="text-align :right"> {{ number_format($jumlah_total2, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="3" style="text-align :right ">Total Biaya Transfer </th>
            <td style="text-align :right"> {{ number_format($jumlah_admin, 0, ',',
                '.') }}</td>
        </tr>
        <tr style="color:black; background-color: lightgreen">
            <th colspan="3" style="text-align :right ">Jumlah Total </th>
            <td style="text-align :right"> {{ number_format($jumlah_akhir, 0, ',',
                '.') }}</td>
        </tr>
    </table>
</body>

</html>

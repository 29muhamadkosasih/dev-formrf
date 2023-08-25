<!DOCTYPE html>
<html>

<head>

    <title>PAID - REQUEST FORM</title>



    <style type=”text/css”>
        table {

            border-spacing: 0px;
            border-collapse: separate;
            border: 1px solid black;
            font-family: sans-serif;
            width: 100%;
            max-width: 600px;
            margin: 15px auto;

        }

        #judul {
            text-align: center;
            font-family: sans-serif;
        }
    </style>



</head>

<body>
    <h3 id=judul>PAID - REQUEST FORM </h3>
    <table align=”center” border=”1″>
        <tr style="background-color: skyblue">
            <th width='80px' style="text-align: center">No RF</th>
            <th width='300px'>Description</th>
            <th width='200px'>Nama Penerima</th>
            <th width='200px'>Jumlah Rp.</th>
        </tr>
        @foreach ($data as $data)
        <tr>
            <td style="text-align: center">{{ $data->no_rf}}</td>
            <td align=left>
                <ul>
                    1. {{ $data->description}} <br>

                    @switch($data)
                    @case($data->description2 == NULL)
                    @break
                    @default
                    2. {{ $data->description2}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description3 == NULL)
                    @break
                    @default
                    3. {{ $data->description3}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description4 == NULL)
                    @break
                    @default
                    4. {{ $data->description4}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description5 == NULL)
                    @break
                    @default
                    5. {{ $data->description5}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description6 == NULL)
                    @break
                    @default
                    6. {{ $data->description6}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description7 == NULL)
                    @break
                    @default
                    7. {{ $data->description7}} <br>
                    @endswitch

                    @switch($data)
                    @case($data->description8 == NULL)
                    @break
                    @default
                    8. {{ $data->description8}}
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
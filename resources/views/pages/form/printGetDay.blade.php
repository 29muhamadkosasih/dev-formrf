<!DOCTYPE html>
<html>

<head>

    <title>PAID - REQUEST FORM</title>



    <style type=”text/css”>
        table {

            font-family: sans-serif;
            width: 100%;
            font-size: 12px;
            max-width: 600px;
            margin: 15px auto;

        }

        #judul {
            text-align: left;
            font-family: sans-serif;
            line-height: 5px;
            font-size: 13px;
        }



        .rangkasurat {
            width: auto;
            margin: auto;
            background-color: #fff;
            height: auto;
            padding: auto;

        }

        .tengah {
            text-align: left;
            line-height: 30px;
        }

        #ping {

            border-spacing: 0px;
            border-collapse: separate;
            border: 1px solid black;
        }
    </style>



</head>

<body>
    <div class="rangkasurat">
        <table>
            <tr>
                <td>
                    <img src="{{ asset('assets/img/favicon/lgo.png') }}" width="130px">
                </td>
                <td class="tengah">
                    <h3>PAID - REQUEST FORM</h3>
                    <!--<h2>DINAS PENDIDIKAN</h2>-->

                </td>
            </tr>
        </table>
    </div>
    <!--<h3 id=judul>PAID - REQUEST FORM </h3>-->
    <h4 id=judul>Tanggal
        <b>
            {{ \Carbon\Carbon::parse($date)->format('d-m-Y')}}
        </b>
    </h4>
    <table align=”center” border=”1″ id="ping">
        <tr style="background-color: skyblue">
            <th width='80px' style="text-align: center">No RF</th>
            <th>Description</th>
            <th>Nama Penerima</th>
            <th>Payment Method</th>
            <th width='110px'>Jumlah Rp.</th>
        </tr>
        @foreach ($data as $data)
        <tr>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">{{ $data->no_rf}}</td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">
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
            </td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">{{ $data->user->name }}</td>
            <td style="text-align :left;padding-left: 10px; padding-right: 10px;">{{ $data->payment }}</td>

            <td style="text-align :right;padding-left: 10px; padding-right: 10px;">{{ number_format($data->jumlah_total,
                0, ',', '.',) }}</td>
        </tr>
        @endforeach
        <tr style="color:black; background-color: lightgreen">
            <th colspan="4" style="text-align :right;padding-left: 10px; padding-right: 10px;">Total Cash</th>
            <td style="text-align :right;padding-left: 10px; padding-right: 10px;"> {{ number_format($jumlah_total, 0,
                ',',
                '.') }}</td>
        </tr>
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
    </table>
</body>

</html>
@extends('layouts/master')

@section('title', 'Payment In')

@section('content')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="5" style="text-align :center ">Payment IN</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align :center ">{{$currentDay2}}</th>
                        </tr>
                        <tr>
                            <th width='10px' style="text-align: center">No</th>
                            <th style="text-align: center">Invoice</th>
                            <th style="text-align: center">Client</th>
                            <th style="text-align: center">Amount (RP.)</th>
                            <th style="text-align: center">Deduction (RP.)</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($payment as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$data->no_invoice}}</td>
                            <td>{{$data->client}}</td>
                            <td style="text-align: right">
                                {{ number_format($data->amount, 0, ',',
                                '.') }}
                            </td>
                            <td style="text-align: right">
                                {{ number_format($data->deduction, 0, ',',
                                '.') }}
                            </td>
                        </tr>
                        @endforeach

                        <tr style="background-color:skyblue">
                            <th colspan="3" style="text-align :right ">TOTAL</th>
                            <td style="text-align :right"> {{ number_format($total_amount, 0, ',',
                                '.') }}</td>
                            <td style="text-align :right">{{ number_format($total_deduction, 0, ',',
                                '.') }}</td>
                        </tr>
                        <tr style="background-color:skyblue">
                            <th colspan="3" style="text-align :right ">Prepared</th>
                            <td colspan="2" style="text-align :right"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
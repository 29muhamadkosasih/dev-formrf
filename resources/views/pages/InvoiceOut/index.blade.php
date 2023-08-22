@extends('layouts/master')

@section('title', 'Invoice Out')

@section('content')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Invoice Out</h5>
                </div>
                <div class="col-auto">
                    @can('invoiceOut.report')
                    <a href="{{ url('invoiceOut/report') }}" class="btn btn-secondary">Report</a>
                    @endcan
                </div>
                <div class="col-auto">
                    @can('invoiceOut.create')

                    <a href="{{ route('invoiceOut.create') }}" class="btn btn-primary">Create</a>
                    @endcan
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th style="text-align: center">No Invoice</th>
                            <th style="text-align: center">Client</th>
                            <th style="text-align: center">Amount (RP.)</th>
                            <th width='150px' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($InvoiceOut as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$data->no_invoice}}</td>
                            <td>{{$data->client}}</td>
                            <td style="text-align: right">
                                {{ number_format($data->amount, 0, ',',
                                '.') }}
                            </td>
                            <td class="text-center">
                                @can('invoiceOut.edit')
                                <a href="{{ route('invoiceOut.edit', $data->id) }}"
                                    class="btn btn-icon btn-warning btn-sm">
                                    <span class="ti ti-edit"></span>
                                </a>
                                @endcan

                                <form action="{{ route('invoiceOut.destroy', $data->id) }}" class="d-inline-block"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('invoiceOut.delete')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-icon btn-danger btn-sm">
                                        <span class="ti ti-trash"></span>
                                    </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
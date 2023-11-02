@extends('layouts/master')
@section('title', 'Resume')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row" style="text-align right">
                <div class="col-auto me-auto ">
                    <h5 class="fs-5 text-left"></h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('resume.index') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="col-center">
                    <h4 class="fs-4 text-center">Daily Cash Flow Report</h4>
                </div>
                <h5 class="fs-5 text-left mt-3">Cash & Bank</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">Tanggal</th>
                                <th width="200px" class="text-center">Petty <br> Cash</th>
                                <th width="200px" class="text-center">Bank Mandiri <br> 7899 - Opr.</th>
                                <th width="200px" class="text-center">Bank Mandiri <br> 7893 - Giro</th>
                                <th width="200px" class="text-center">Bank Mandiri <br> 7894 - LSP</th>
                                <th width="200px" class="text-center">Bank Mandiri <br> 1176 - Batam</th>
                                <th width="200px" class="text-center">Bank Mandiri <br> 7897 - Cadangan</th>
                                <th width="200px" class="text-center">Jumlah <br> (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)

                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_petty_cash, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_mandiri_opr, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_mandiri_giro, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_mandiri_lsp, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_mandiri_batam, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_mandiri_cadangan, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">
                                    {{ number_format($item->cb_total, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            @endforeach
                            <tr style="background-color: yellow">
                                <td style="text-align: right" colspan="7">TOTAL</td>
                                <td style="text-align: right">{{ number_format($totalCbTotal, 2, ',', '.')?? 0
                                    }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="fs-5 text-left mt-3">Arus Kas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">TAnggal</th>
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $show)

                            <tr style="background-color:wheat">
                                <td>{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td>Total arus kas masuk</td>
                                <td style="text-align: right"> {{ number_format($show->ak_masuk_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_masuk, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_total_masuk, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td>Total arus kas keluar</td>
                                <td style="text-align: right"> {{ number_format($show->ak_keluar_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_keluar, 2, ',', '.')?? 0
                                    }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_total_keluar, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            @endforeach

                            <tr style="background-color: yellow">
                                <td style="text-align: right" colspan="4">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->ak_total, 2, ',', '.')?? 0}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="fs-5 text-left mt-3">OVERBOOKING / PINDAH BUKU</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">TAnggal</th>
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pb as $show)

                            <tr style="background-color:wheat">
                                <td>{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td>899 TO 893</td>
                                <td style="text-align: right"> {{ number_format($show->pb_899_893_kemarin, 2, ',',
                                    '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->pb_899_893, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td>893 TO 899</td>
                                <td style="text-align: right"> {{ number_format($show->ak_keluar_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->ak_keluar, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr style="background-color: skyblue">
                                <td style="text-align: right" colspan="2">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->ak_total_kemarin, 2, ',', '.')?? 0
                                    }}</td>
                                <td style="text-align: right">{{ number_format($show->ak_total_today, 2, ',', '.')?? 0
                                    }}</td>
                            </tr>
                            @endforeach

                            <tr style="background-color: yellow">
                                <td style="text-align: right" colspan="3">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->ak_total, 2, ',', '.')?? 0
                                    }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h5 class="fs-5 text-left mt-3">Revenue / Sales</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr style="background-color: skyblue">
                                <th width="200px" class="text-center">TAnggal</th>
                                <th width="200px" class="text-center">DESKRIPSI</th>
                                <th width="200px" class="text-center">JUMLAH KEMARIN (Rp.)</th>
                                <th width="200px" class="text-center">JUMLAH HARI INI (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revenue as $show)

                            <tr>
                                <td>{{ \Carbon\Carbon::parse($show->tgl_resume)->translatedFormat('l, j F
                                    Y') }}</td>
                                <td>Jumlah Revenue / Sales</td>
                                <td style="text-align: right"> {{ number_format($show->rs_total_kemarin, 2, ',', '.')??
                                    0 }}
                                </td>
                                <td style="text-align: right">{{ number_format($show->rs_total_today, 2, ',', '.')?? 0
                                    }}
                                </td>
                            </tr>
                            <tr style="background-color: skyblue">
                                <td style="text-align: right" colspan="2">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->rs_total_kemarin, 2, ',', '.')?? 0
                                    }}</td>
                                <td style="text-align: right">{{ number_format($show->rs_total_today, 2, ',', '.')?? 0
                                    }}</td>
                            </tr>
                            @endforeach

                            <tr style="background-color: yellow">
                                <td style="text-align: right" colspan="3">TOTAL</td>
                                <td style="text-align: right">{{ number_format($show->rs_total, 2, ',', '.')?? 0
                                    }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

@extends('layouts/master')
@section('content')
@section('title', 'Form')
<!-- Invoice table -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-auto me-auto ">
                    <h5 class="mb-0">List Data Form
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalScrollable">
                        Create
                    </button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered zero-configuration">
                    <thead>
                        <tr style="background-color: skyblue">
                            <th width='10px' style="text-align: center">No</th>
                            <th class="text-center">Tgl Pengajuan</th>
                            <th class="text-center">Keperluan</th>
                            <th class="text-center">Untuk</th>
                            <th class="text-center">Pengajuan</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Tgl Kebutuhan</th>
                            <th class="text-center">Status</th>
                            <th width='200px' style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($form as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{ $data->keperluan->name }}
                            </td>
                            <td>
                                {{ $data->rujukan->name }}
                            </td>
                            <td>
                                {{ $data->kpengajuan->name }}
                            </td>
                            <td>
                                {{ $data->payment }}
                            </td>
                            <td>
                                {{ $data->tanggal_kebutuhan }}
                            </td>
                            <td>
                                @switch($data)
                                @case($data->status == 0)
                                <span class="badge bg-secondary">Pending</span>
                                @break
                                @case($data->status == 1)
                                <span class="badge bg-danger">Reject</span>
                                @break
                                @case($data->status == 2)
                                <span class="badge bg-info">Approve</span>
                                @break
                                @case($data->status == 3)
                                <span class="badge bg-danger">Cancel</span>
                                @break
                                @case($data->status == 4)
                                <span class="badge bg-primary">Menuggu Konfirmasi Dana</span>
                                @break
                                @case($data->status == 5)
                                <span class="badge bg-success">Konfirmasi Dana Masuk</span>
                                @break

                                @case($data->status == 6)
                                <span class="badge bg-primary">Konfirmasi Pembayaran </span>
                                @break
                                @case($data->status == 7)
                                <span class="badge bg-info">Menuggu Konfirmasi Pengembalian Dana </span>
                                @break

                                @default
                                <span class="badge bg-success">PAID</span>
                                @endswitch
                            </td>

                            <td class="text-center">
                                @switch($data)

                                @case($data->status == 1)
                                <span class="badge bg-danger">RF di Tolak</span>
                                @break

                                @case($data->status == 3)
                                <span class="badge bg-danger">RF di Tolak</span>
                                @break

                                @case($data->status == 4)
                                <span class="badge bg-primary">Menuggu Konfirmasi Dana</span>
                                @break

                                @case($data->status == 5)
                                @switch($data)
                                @case($data->kpengajuan_id == 1)
                                <a href="{{ url('approve/konfirmasi', $data->id) }}"
                                    class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                    data-bs-original-title="Konfirmasi">
                                    <span class="ti ti-check"></span>
                                </a>
                                @break
                                @default
                                <a href="{{ url('approveman/konfirmasiRem', $data->id) }}"
                                    class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                    data-bs-original-title="Konfirmasi">
                                    <span class="ti ti-check"></span>
                                </a>
                                @endswitch

                                @break
                                @case($data->status == 6)
                                <a href="{{ route('form-man.detail', $data->id) }}"
                                    class="btn btn-icon btn-primary btn-sm" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-primary"
                                    data-bs-original-title="Konfirmasi Pembayaran">
                                    <span class="ti ti-eye"></span>
                                </a>
                                @break

                                @case($data->status == 7)
                                <span class="badge bg-info">Waiting</span>
                                @break

                                @case($data->status == 8)
                                <span class="badge bg-success">PAID</span>
                                @break

                                @default
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('form-man.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href=" {{ route('form-man.show', $data->id) }}"
                                        class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                        data-bs-original-title="Show">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    <a href="{{ route('form-man.edit', $data->id) }}"
                                        class="btn btn-icon btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                        data-bs-original-title="Edit">
                                        <span class="ti ti-edit"></span>
                                    </a>
                                    {{-- <button type="submit" class="btn btn-icon btn-danger btn-sm">
                                        <span class="ti ti-trash"></span>
                                    </button> --}}
                                </form>
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Invoice table -->

<form action="{{ route('form-man.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h3 class="text-center justify-content-center" id="modalScrollableTitle" style="text-align: center">
                        Buat Pengajuan Dana
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" name="departement_id" value="{{ Auth::user()->departement_id }}">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Dari
                                </label>
                                <input type="text" class="form-control" id="basicInput" name="from_id"
                                    placeholder="Enter" required value="{{ Auth::user()->name }}" readonly />
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Kategori
                                    Pengajuan
                                </label>
                                <select class="form-select @error('kpengajuan_id') is-invalid @enderror"
                                    id="selectDefault" name="kpengajuan_id" required>
                                    <option selected>Open this select</option>
                                    @foreach ($kpengajuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kpengajuan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Keperluan
                                </label>
                                <select class="form-select @error('keperluan_id') is-invalid @enderror"
                                    id="selectDefault" name="keperluan_id" onchange="enableBrand2(this)" required>
                                    <option selected>Open this select</option>
                                    @foreach ($keperluan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('keperluan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Tanggal
                                    Kebutuhan
                                </label>
                                <input type="date" class="form-control" id="basicInput" placeholder="Enter"
                                    name="tanggal_kebutuhan" required />
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">
                                    Ditujukan Untuk
                                </label>
                                <select class="form-select @error('rujukan_id') is-invalid @enderror" id="selectDefault"
                                    name="rujukan_id" required>
                                    <option>Open this select</option>
                                    @foreach ($rujukan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('rujukan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">
                                    Payment
                                </label>
                                <select class="form-select @error('payment') is-invalid @enderror" id="selectDefault"
                                    name="payment" onchange="enableBrand(this)" required>
                                    <option selected>Open this select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                                @error('payment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 d-none" id="carbrand">
                            <div class="mb-1">
                                <label class="form-label" for="select2-basic">
                                    Nama Rekening Penerima
                                </label>
                                <select class="select2 form-select" id="select2-basic" name="norek_id">
                                    <option></option>
                                    @foreach ($norek as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->no_rekening }} &nbsp; A/N &nbsp; {{ $item->nama_penerima }} &nbsp;
                                        ( {{ $item->bank->nama_bank }} )
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t1">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    No. Project
                                </label>
                                <input type="text" class="form-control" id="basicInput" name="no_project"
                                    placeholder="Enter" autofocus />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t2">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Jumlah Peserta
                                </label>
                                <input type="number" class="form-control" id="basicInput" name="j_peserta"
                                    placeholder="Enter" autofocus />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t3">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">
                                    Jumlah Trainer / Asesor
                                </label>
                                <input type="number" class="form-control" id="basicInput" name="j_traine_asesor"
                                    placeholder="Enter" autofocus />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t4">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Jumlah Assist
                                </label>
                                <input type="number" class="form-control" id="basicInput" name="j_assist"
                                    placeholder="Enter" autofocus />
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="card accordion-item active">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#accordionOne" aria-expanded="true"
                                            aria-controls="accordionOne">
                                            Pengajuan 1 </button>
                                    </h2>

                                    <div id="accordionOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description" placeholder="Enter" autofocus required />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit" placeholder="Enter" autofocus required />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price" placeholder="Enter" autofocus required />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty" placeholder="Enter" autofocus required />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image1"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                            aria-expanded="false" aria-controls="accordionTwo">
                                            Pengajuan 2
                                        </button>
                                    </h2>

                                    <div id="accordionTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description2" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit2" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price2" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty2" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image2"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionThree"
                                            aria-expanded="false" aria-controls="accordionThree">
                                            Pengajuan 3
                                        </button>
                                    </h2>
                                    <div id="accordionThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description3" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit3" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price3" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty3" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image3"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                            aria-expanded="false" aria-controls="accordionFour">
                                            Pengajuan 4
                                        </button>
                                    </h2>
                                    <div id="accordionFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description4" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit4" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price4" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty4" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image4"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionFive"
                                            aria-expanded="false" aria-controls="accordionFive">
                                            Pengajuan 5
                                        </button>
                                    </h2>
                                    <div id="accordionFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description5" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit5" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price5" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty5" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image5"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionSix"
                                            aria-expanded="false" aria-controls="accordionSix">
                                            Pengajuan 6
                                        </button>
                                    </h2>
                                    <div id="accordionSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description6" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit6" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price6" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty6" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image6"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionSeven"
                                            aria-expanded="false" aria-controls="accordionSeven">
                                            Pengajuan 7
                                        </button>
                                    </h2>
                                    <div id="accordionSeven" class="accordion-collapse collapse"
                                        aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description7" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit7" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price7" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty7" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image7"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingEight">
                                        <button type="button" class="accordion-button collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#accordionEight"
                                            aria-expanded="false" aria-controls="accordionEight">
                                            Pengajuan 8
                                        </button>
                                    </h2>
                                    <div id="accordionEight" class="accordion-collapse collapse"
                                        aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="description8" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" id="basicInput"
                                                            name="unit8" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="price8" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" id="basicInput"
                                                            name="qty8" placeholder="Enter" autofocus />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image8"
                                                            placeholder="Enter" autofocus />
                                                        <div id="defaultFormControlHelp" class="form-text">
                                                            * Max. file 15MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script type="text/javascript">
    function enableBrand(answer) {
        console.log(answer.value);
        if (answer.value == 'Transfer') {
            document.getElementById('carbrand').classList.remove('d-none');
        } else {
            document.getElementById('carbrand').classList.add('d-none');
        }
    }
</script>
<script type="text/javascript">
    function enableBrand2(answer) {
        console.log(answer.value);
        if (answer.value == 1 ) {
            document.getElementById('t1').classList.remove('d-none');
            document.getElementById('t2').classList.remove('d-none');
            document.getElementById('t3').classList.remove('d-none');
            document.getElementById('t4').classList.remove('d-none');

        } else {
            document.getElementById('t1').classList.add('d-none');
            document.getElementById('t2').classList.add('d-none');
            document.getElementById('t3').classList.add('d-none');
            document.getElementById('t4').classList.add('d-none');
        }
    }
</script>
@endsection
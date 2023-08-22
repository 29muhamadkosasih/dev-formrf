@extends('layouts.master')
@section('content')
@section('title', 'Form')
<div class="col-xl-12">
    <div class="card">
        <form action="{{ route('form-approve.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h5 class="card-header">Edit Form</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Dari</label>
                            <input type="hidden" name="from_id" value="{{ $edit->from_id }}" />
                            <input type="hidden" name="departement_id" value="{{ $edit->departement_id }}" />

                            <input type="hidden" name="kpengajuan_id" value="{{ $edit->kpengajuan_id }}" />
                            <input type="hidden" name="keperluan_id" value="{{ $edit->keperluan_id }}" />
                            <input type="hidden" name="payment" value="{{ $edit->payment }}" />
                            <input type="hidden" name="rujukan_id" value="{{ $edit->rujukan_id }}" />
                            <input type="hidden" name="norek_id" value="{{ $edit->norek_id }}" />

                            <input type="hidden" name="image1" value="{{ $edit->image1 }}" />
                            <input type="hidden" name="image2" value="{{ $edit->image2 }}" />
                            <input type="hidden" name="image3" value="{{ $edit->image3 }}" />
                            <input type="hidden" name="image4" value="{{ $edit->image4 }}" />
                            <input type="hidden" name="image5" value="{{ $edit->image5 }}" />
                            <input type="hidden" name="image6" value="{{ $edit->image6 }}" />
                            <input type="hidden" name="image7" value="{{ $edit->image7 }}" />
                            <input type="hidden" name="image8" value="{{ $edit->image8 }}" />

                            <input type="hidden" name="no_project" value="{{ $edit->no_project }}" />
                            <input type="hidden" name="j_peserta" value="{{ $edit->j_peserta }}" />
                            <input type="hidden" name="j_traine_asesor" value="{{ $edit->j_traine_asesor }}" />
                            <input type="hidden" name="j_assist" value="{{ $edit->j_assist }}" />

                            <input type="text" class="form-control" id="basicInput" placeholder="Enter" required
                                value="{{ $edit->user->name }}" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Kategori
                                Pengajuan</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter" required
                                value="{{ $edit->kpengajuan->name }}" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">
                                Keperluan
                            </label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter" required
                                value="{{ $edit->keperluan->name }}" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Tanggal
                                Kebutuhan</label>
                            <input type="date" class="form-control" id="basicInput" placeholder="Enter"
                                name="tanggal_kebutuhan" required value="{{ $edit->tanggal_kebutuhan }}" />
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="helpInputTop">Payment</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter" required
                                value="{{ $edit->payment }}" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="helpInputTop">Ditujukan Untuk</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter" required
                                value="{{ $edit->rujukan->name}}" readonly />
                        </div>
                    </div>
                    @switch($edit)
                    @case($edit->payment == 'Transfer')

                    <div class="row g-0">
                        <div class="col-md p-4">
                            <div class="cardMaster border p-3 rounded ">
                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                    <div class="card-information mb-4">
                                        <h6 class="mb-2 pt-2">Transfer</h6>
                                        <span class="card-number">
                                            {{ $edit->norek->no_rekening }} &nbsp; A/N &nbsp; {{
                                            $edit->norek->nama_penerima }} &nbsp;
                                            ( {{ $edit->norek->bank->nama_bank }} )
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md p-4">
                            <div class="cardMaster border p-3 rounded">
                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                    <div class="card-information">
                                        <h6 class="mb-2 pt-1">Biaya Admin</h6>
                                        <div class="form-check mt-1">
                                            <input name="b_admin" class="form-check-input" type="radio" value="0"
                                                id="defaultRadio1">
                                            <label class="form-check-label" for="defaultRadio1"><span
                                                    class="badge bg-success">Free</span> </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="b_admin" class="form-check-input" type="radio" value="6500"
                                                id="defaultRadio2" checked="">
                                            <label class="form-check-label" for="defaultRadio2"> Rp. 6.500 </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12 col-md-12 col-12 m-2">
                        <label class="form-label" for="helpInputTop">Biaya Admin</label>
                        <div class="form-check mt-1">
                            <input name="b_admin" class="form-check-input" type="radio" value="0" id="defaultRadio1">
                            <label class="form-check-label" for="defaultRadio1"><span
                                    class="badge bg-success">Free</span> </label>
                        </div>
                        <div class="form-check">
                            <input name="b_admin" class="form-check-input" type="radio" value="6500" id="defaultRadio2"
                                checked="">
                            <label class="form-check-label" for="defaultRadio2"> Rp. 6.500 </label>
                        </div>
                    </div> --}}
                    @break
                    @default
                    @endswitch
                </div>
                <div class="col-xl-12 col-md-12 col-12 mb-0">
                    <div class="accordion" id="accordionExample">
                        <div class="card accordion-item active">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                    Pengajuan 1 </button>
                            </h2>

                            <div id="accordionOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description" placeholder="Enter"
                                                    value="{{ $edit->description }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit"
                                                    placeholder="Enter" value="{{ $edit->unit }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price"
                                                    placeholder="Enter" value="{{ $edit->price }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty"
                                                    placeholder="Enter" value="{{ $edit->qty }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image1"
                                                    placeholder="Enter" autofocus value="{{$edit->image1}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                    Pengajuan 2
                                </button>
                            </h2>

                            <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description2" placeholder="Enter"
                                                    value="{{ $edit->description2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit2"
                                                    placeholder="Enter" value="{{ $edit->unit2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price2"
                                                    placeholder="Enter" value="{{ $edit->price2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty2"
                                                    placeholder="Enter" value="{{ $edit->qty2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image2"
                                                    placeholder="Enter" autofocus value="{{$edit->image2}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionThree" aria-expanded="false"
                                    aria-controls="accordionThree">
                                    Pengajuan 3
                                </button>
                            </h2>
                            <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description3" placeholder="Enter"
                                                    value="{{ $edit->description3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit3"
                                                    placeholder="Enter" value="{{ $edit->unit3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price3"
                                                    placeholder="Enter" value="{{ $edit->price3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty3"
                                                    placeholder="Enter" value="{{ $edit->qty3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image3"
                                                    placeholder="Enter" autofocus value="{{$edit->image3}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                                    Pengajuan 4
                                </button>
                            </h2>
                            <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description4" placeholder="Enter"
                                                    value="{{ $edit->description4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit4"
                                                    placeholder="Enter" value="{{ $edit->unit4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price4"
                                                    placeholder="Enter" value="{{ $edit->price4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty4"
                                                    placeholder="Enter" value="{{ $edit->qty4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image4"
                                                    placeholder="Enter" autofocus value="{{$edit->image4}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive">
                                    Pengajuan 5
                                </button>
                            </h2>
                            <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Description
                                                </label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description5" placeholder="Enter" autofocus
                                                    value="{{ $edit->description5 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Unit
                                                </label>
                                                <input type="text" class="form-control" id="basicInput" name="unit5"
                                                    placeholder="Enter" autofocus value="{{ $edit->unit5 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">
                                                    Price
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="price5"
                                                    placeholder="Enter" autofocus value="{{ $edit->price5 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Qty
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="qty5"
                                                    placeholder="Enter" autofocus value="{{ $edit->qty5 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image5"
                                                    placeholder="Enter" autofocus value="{{$edit->image5}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionSix" aria-expanded="false" aria-controls="accordionSix">
                                    Pengajuan 6
                                </button>
                            </h2>
                            <div id="accordionSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Description
                                                </label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description6" placeholder="Enter" autofocus
                                                    value="{{ $edit->description6 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Unit
                                                </label>
                                                <input type="text" class="form-control" id="basicInput" name="unit6"
                                                    placeholder="Enter" autofocus value="{{ $edit->unit6 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">
                                                    Price
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="price6"
                                                    placeholder="Enter" autofocus value="{{ $edit->price6 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Qty
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="qty6"
                                                    placeholder="Enter" autofocus value="{{ $edit->qty6 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image6"
                                                    placeholder="Enter" autofocus value="{{$edit->image6}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionSeven" aria-expanded="false"
                                    aria-controls="accordionSeven">
                                    Pengajuan 7
                                </button>
                            </h2>
                            <div id="accordionSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Description
                                                </label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description7" placeholder="Enter" autofocus
                                                    value="{{ $edit->description7 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Unit
                                                </label>
                                                <input type="text" class="form-control" id="basicInput" name="unit7"
                                                    placeholder="Enter" autofocus value="{{ $edit->unit7 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">
                                                    Price
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="price7"
                                                    placeholder="Enter" autofocus value="{{ $edit->price7 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Qty
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="qty7"
                                                    placeholder="Enter" autofocus value="{{ $edit->qty7 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image7"
                                                    placeholder="Enter" autofocus value="{{$edit->image7}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionEight" aria-expanded="false"
                                    aria-controls="accordionEight">
                                    Pengajuan 8
                                </button>
                            </h2>
                            <div id="accordionEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Description
                                                </label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description8" placeholder="Enter" autofocus
                                                    value="{{ $edit->description8 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Unit
                                                </label>
                                                <input type="text" class="form-control" id="basicInput" name="unit8"
                                                    placeholder="Enter" autofocus value="{{ $edit->unit8 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">
                                                    Price
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="price8"
                                                    placeholder="Enter" autofocus value="{{ $edit->price8 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Qty
                                                </label>
                                                <input type="number" class="form-control" id="basicInput" name="qty8"
                                                    placeholder="Enter" autofocus value="{{ $edit->qty8 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">
                                                    Lampirkan File
                                                </label>
                                                <input type="file" class="form-control" name="image8"
                                                    placeholder="Enter" autofocus value="{{$edit->image8}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-0 pt-20 mb-4">
                <a href="{{ route('form-approve.index') }}" class="btn btn-outline-secondary me-1">Back</a>
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
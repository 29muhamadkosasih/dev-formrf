@extends('layouts.master')
@section('content')
@section('title', 'Form')

<div class="col-xl-12">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Form </h5>
            </div>
            <form action="{{ route('form-man.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Dari</label>
                                <input type="text" class="form-control" id="basicInput" name="from_id"
                                    placeholder="Enter" required value="{{ $edit->user->name }}" readonly />
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Kategori
                                    Pengajuan
                                </label>
                                <select class="form-control @error('kpengajuan_id') is-invalid @enderror"
                                    id="selectDefault" name="kpengajuan_id" required>
                                    <option value="">Open this select</option>
                                    @foreach ($kpengajuan as $item)
                                    <option value="{{ $item->id }}" {{ old('kpengajuan_id', $edit->kpengajuan_id) ==
                                        $item->id ? 'selected' : null }}>{{ $item->name }}</option>
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
                                <select class="form-control @error('keperluan_id') is-invalid @enderror"
                                    onchange="enableBrand2(this)" id="satu" name="keperluan_id" required>
                                    <option value="">Open this select</option>
                                    @foreach ($keperluan as $item)
                                    <option value="{{ $item->id }}" {{ old('keperluan_id', $edit->keperluan_id) ==
                                        $item->id ? 'selected' : null }}>
                                        {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('keperluan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="departement_id" value="{{ Auth::user()->departement_id }}">
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
                                <label class="form-label" for="helpInputTop">Ditujukan Untuk</label>
                                <select class="form-control @error('rujukan_id') is-invalid @enderror"
                                    id="selectDefault" name="rujukan_id" required>
                                    <option value="">Open this select</option>
                                    @foreach ($rujukan as $item)
                                    <option value="{{ $item->id }}" {{ old('rujukan_id', $edit->rujukan_id)==$item->id ?
                                        'selected' : null
                                        }}>{{ $item->name }}</option>
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
                                <label class="form-label" for="helpInputTop">Payment</label>
                                <select class="form-control @error('payment') is-invalid @enderror" name="payment"
                                    id="car" onchange="enableBrand(this)" required>
                                    <option value="">Open this select</option>

                                    <option value="Cash" {{($edit->payment === 'Cash') ? 'Selected' : ''}}>Cash</option>
                                    <option value="Transfer" {{($edit->payment === 'Transfer') ? 'Selected' :
                                        ''}}>Transfer</option>
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
                                <select class="select2 form-control" id="select2-basic" name="norek_id">
                                    <option></option>
                                    @foreach ($norek as $item)
                                    <option value="{{ $item->id }}" {{ old('norek_id', $edit->norek_id) ==
                                        $item->id ? 'selected' : null }}>
                                        {{ $item->no_rekening }} &nbsp; A/N &nbsp; {{ $item->nama_penerima }} &nbsp;
                                        ( {{ $item->bank->nama_bank }} ) </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t1">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    No. Project
                                </label>
                                <input type="text" class="form-control" name="no_project" placeholder="Enter" autofocus
                                    value="{{ old('no_project', $edit->no_project) }}" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t2">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Jumlah Peserta
                                </label>
                                <input type="number" class="form-control" name="j_peserta" placeholder="Enter" autofocus
                                    value="{{ old('j_peserta',$edit->j_peserta) }}" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t3">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">
                                    Jumlah Trainer / Asesor
                                </label>
                                <input type="number" class="form-control" name="j_traine_asesor" placeholder="Enter"
                                    autofocus value="{{ old('j_traine_asesor',$edit->j_traine_asesor) }}" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 d-none" id="t4">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">
                                    Jumlah Assist
                                </label>
                                <input type="number" class="form-control" name="j_assist" placeholder="Enter" autofocus
                                    value="{{ old('j_assist',$edit->j_assist) }}" />
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
                                                        <label class="form-label" for="basicInput">Description</label>
                                                        <input type="text" class="form-control" name="description"
                                                            placeholder="Enter" value="{{ $edit->description  }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Unit</label>
                                                        <input type="text" class="form-control" name="unit"
                                                            placeholder="Enter" value="{{ $edit->unit }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">Price Rp.</label>
                                                        <input type="text" class="form-control" name="price"
                                                            placeholder="Enter" value=" {{ $edit->price }}"
                                                            id="tanpa-rupiah" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Qty</label>
                                                        <input type="number" class="form-control" name="qty"
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
                                                        <label class="form-label" for="basicInput">Description</label>
                                                        <input type="text" class="form-control" name="description2"
                                                            placeholder="Enter" value="{{ $edit->description2 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Unit</label>
                                                        <input type="text" class="form-control" name="unit2"
                                                            placeholder="Enter" value="{{ $edit->unit2 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">Price Rp.</label>
                                                        <input type="text" class="form-control" name="price2"
                                                            placeholder="Enter" value="{{ $edit->price2 }}"
                                                            id="tanpa-rupiah2" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Qty</label>
                                                        <input type="text" class="form-control" name="qty2"
                                                            placeholder="Enter" value="{{ $edit->qty2 }}"
                                                            id="tanpa-rupiah2" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image2"
                                                            placeholder="Enter" autofocus value="{{$edit->image2}}" />
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
                                                        <label class="form-label" for="basicInput">Description</label>
                                                        <input type="text" class="form-control" name="description3"
                                                            placeholder="Enter" value="{{ $edit->description3 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Unit</label>
                                                        <input type="text" class="form-control" name="unit3"
                                                            placeholder="Enter" value="{{ $edit->unit3 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">Price Rp.</label>
                                                        <input type="text" class="form-control" name="price3"
                                                            placeholder="Enter" value="{{ $edit->price3 }}"
                                                            id="tanpa-rupiah3" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Qty</label>
                                                        <input type="text" class="form-control" name="qty3"
                                                            placeholder="Enter" value="{{ $edit->qty3 }}"
                                                            id="tanpa-rupiah3" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image3"
                                                            placeholder="Enter" autofocus value="{{$edit->image3}}" />
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
                                                        <label class="form-label" for="basicInput">Description</label>
                                                        <input type="text" class="form-control" name="description4"
                                                            placeholder="Enter" value="{{ $edit->description4 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Unit</label>
                                                        <input type="text" class="form-control" name="unit4"
                                                            placeholder="Enter" value="{{ $edit->unit4 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">Price Rp.</label>
                                                        <input type="text" class="form-control" name="price4"
                                                            placeholder="Enter" value="{{ $edit->price4 }}"
                                                            id="tanpa-rupiah4" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">Qty</label>
                                                        <input type="text" class="form-control" name="qty4"
                                                            placeholder="Enter" value="{{ $edit->qty4 }}"
                                                            id="tanpa-rupiah4" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Lampirkan File
                                                        </label>
                                                        <input type="file" class="form-control" name="image4"
                                                            placeholder="Enter" autofocus value="{{$edit->image4}}" />
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
                                                        <input type="text" class="form-control" name="description5"
                                                            placeholder="Enter" autofocus
                                                            value="{{ $edit->description5 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" name="unit5"
                                                            placeholder="Enter" autofocus value="{{ $edit->unit5 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price Rp.
                                                        </label>
                                                        <input type="text" class="form-control" name="price5"
                                                            placeholder="Enter" autofocus value="{{ $edit->price5 }}"
                                                            id="tanpa-rupiah5" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" name="qty5"
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
                                                        <input type="text" class="form-control" name="description6"
                                                            placeholder="Enter" autofocus
                                                            value="{{ $edit->description6 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" name="unit6"
                                                            placeholder="Enter" autofocus value="{{ $edit->unit6 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price Rp.
                                                        </label>
                                                        <input type="text" class="form-control" name="price6"
                                                            placeholder="Enter" autofocus value="{{ $edit->price6 }}"
                                                            id="tanpa-rupiah6" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" name="qty6"
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
                                                        <input type="text" class="form-control" name="description7"
                                                            placeholder="Enter" autofocus
                                                            value="{{ $edit->description7 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" name="unit7"
                                                            placeholder="Enter" autofocus value="{{ $edit->unit7 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price Rp.
                                                        </label>
                                                        <input type="text" class="form-control" name="price7"
                                                            placeholder="Enter" autofocus value="{{ $edit->price7 }}"
                                                            id="tanpa-rupiah7" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" name="qty7"
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
                                                        <input type="text" class="form-control" name="description8"
                                                            placeholder="Enter" autofocus
                                                            value="{{ $edit->description8 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Unit
                                                        </label>
                                                        <input type="text" class="form-control" name="unit8"
                                                            placeholder="Enter" autofocus value="{{ $edit->unit8 }}" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="helpInputTop">
                                                            Price Rp.
                                                        </label>
                                                        <input type="text" class="form-control" name="price8"
                                                            placeholder="Enter" autofocus value="{{ $edit->price8 }}"
                                                            id="tanpa-rupiah8" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="basicInput">
                                                            Qty
                                                        </label>
                                                        <input type="number" class="form-control" name="qty8"
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
                <div class="col-12 text-center mb-4 mt-1 pt-20">
                    <a href="{{ route('form-man.index') }}" class="btn btn-outline-secondary me-1">Back</a>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

    var inputValue = document.getElementById("car").value;

    if (inputValue === 'Transfer') {
        console.log("Transfer");
        document.getElementById('carbrand').classList.remove('d-none');
    } else {
        document.getElementById('carbrand').classList.add('d-none');
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

<script>
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function (e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function (e) {
        tanpa_rupiah2.value = formatRupiah2(this.value);
    });

    /* Fungsi */
    function formatRupiah2(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
    tanpa_rupiah4.addEventListener('keyup', function (e) {
        tanpa_rupiah4.value = formatRupiah4(this.value);
    });

    /* Fungsi */
    function formatRupiah4(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_rupiah5 = document.getElementById('tanpa-rupiah5');
    tanpa_rupiah5.addEventListener('keyup', function (e) {
        tanpa_rupiah5.value = formatRupiah5(this.value);
    });

    /* Fungsi */
    function formatRupiah5(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah6 = document.getElementById('tanpa-rupiah6');
    tanpa_rupiah6.addEventListener('keyup', function (e) {
        tanpa_rupiah6.value = formatRupiah6(this.value);
    });

    /* Fungsi */
    function formatRupiah6(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah7 = document.getElementById('tanpa-rupiah7');
    tanpa_rupiah7.addEventListener('keyup', function (e) {
        tanpa_rupiah7.value = formatRupiah7(this.value);
    });

    /* Fungsi */
    function formatRupiah7(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var tanpa_rupiah8 = document.getElementById('tanpa-rupiah8');
    tanpa_rupiah8.addEventListener('keyup', function (e) {
        tanpa_rupiah8.value = formatRupiah8(this.value);
    });

    /* Fungsi */
    function formatRupiah8(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $(document).ready(function () {
        // Format mata uang.
        $('#uang').mask('000.000.000', {
            reverse: true
        });
    })
</script>

<script>
    var tanpa_rupiah3 = document.getElementById('tanpa-rupiah3');
    tanpa_rupiah3.addEventListener('keyup', function (e) {
        tanpa_rupiah3.value = formatRupiah3(this.value);
    });

    /* Fungsi */
    function formatRupiah3(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var inputValue = document.getElementById("satu").value;

        if (inputValue === "1") {
        console.log("Nilai input teks kosong.");
        document.getElementById('t1').classList.remove('d-none');
        document.getElementById('t2').classList.remove('d-none');
        document.getElementById('t3').classList.remove('d-none');
        document.getElementById('t4').classList.remove('d-none');
        } else {
        console.log("Nilai input teks: " + inputValue);
        document.getElementById('t1').classList.add('d-none');
        document.getElementById('t2').classList.add('d-none');
        document.getElementById('t3').classList.add('d-none');
        document.getElementById('t4').classList.add('d-none');
        }
</script>

@endsection

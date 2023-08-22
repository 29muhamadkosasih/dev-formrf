@extends('layouts.master')
@section('content')
@section('title', 'Form')
<section id="complex-header-datatable">
    <div class="row">
        <div class="offset-2 col-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"> Checked Pengajuan</h4>
                </div>
                <form action="{{ route('form-checked.checked', $show->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Dari</label>
                                    <input type="text" class="form-control" id="basicInput" name="from_id"
                                        placeholder="Enter" required value="{{ $show->user->id }}" readonly />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Kategori
                                        Pengajuan</label>
                                    <select class="form-select" id="selectDefault" name="ketegori_pengajuan" required
                                        readonly>
                                        <option selected>{{ $show->ketegori_pengajuan }}</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Reimburse">Reimburse</option>
                                        <option value="Payment">Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helpInputTop">Departement</label>
                                    <select class="form-select" id="selectDefault" name="departement" required readonly>
                                        <option selected>{{ $show->departement }}</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Supervisor">Supervisor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Tanggal
                                        Kebutuhan</label>
                                    <input type="date" class="form-control" id="basicInput" placeholder="Enter"
                                        name="tanggal_kebutuhan" required value="{{ $show->tanggal_kebutuhan }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helpInputTop">Payment</label>
                                    <select class="form-select" id="selectDefault" name="payment" required>
                                        <option selected>{{ $show->payment }}</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helpInputTop">Ditujukan Untuk</label>
                                    <select class="form-select" id="selectDefault" name="to" required>
                                        <option selected>{{ $show->to }}</option>
                                        <option value="SPV">SPV</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Direktur Utama">Direktur Utama</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordionIcon" class="accordion accordion-without-arrow">
                        <div class="accordion-item">
                            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                    Form Pengajuan 1
                                </button>
                            </h2>
                            <div id="accordionIcon-2" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description" placeholder="Enter"
                                                    value="{{ $show->description }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit"
                                                    placeholder="Enter" value="{{ $show->unit }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price"
                                                    placeholder="Enter" value="{{ $show->price }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty"
                                                    placeholder="Enter" value="{{ $show->qty }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header text-body d-flex justify-content-between"
                                id="accordionIconThree">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-3" aria-expanded="true"
                                    aria-controls="accordionIcon-3">
                                    Form Pengajuan 2
                                </button>
                            </h2>
                            <div id="accordionIcon-3" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description2" placeholder="Enter"
                                                    value="{{ $show->description2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit2"
                                                    placeholder="Enter" value="{{ $show->unit2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price2"
                                                    placeholder="Enter" value="{{ $show->price2 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty2"
                                                    placeholder="Enter" value="{{ $show->qty2 }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header text-body d-flex justify-content-between"
                                id="accordionIconFour">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-4" aria-expanded="true"
                                    aria-controls="accordionIcon-4">
                                    Form Pengajuan 3
                                </button>
                            </h2>
                            <div id="accordionIcon-4" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description3" placeholder="Enter"
                                                    value="{{ $show->description3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit3"
                                                    placeholder="Enter" value="{{ $show->unit3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price3"
                                                    placeholder="Enter" value="{{ $show->price3 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty3"
                                                    placeholder="Enter" value="{{ $show->qty3 }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-1" aria-expanded="true"
                                    aria-controls="accordionIcon-1">
                                    Form Pengajuan 4
                                </button>
                            </h2>
                            <div id="accordionIcon-1" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Description</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    name="description4" placeholder="Enter"
                                                    value="{{ $show->description4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Unit</label>
                                                <input type="text" class="form-control" id="basicInput" name="unit4"
                                                    placeholder="Enter" value="{{ $show->unit4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Price</label>
                                                <input type="text" class="form-control" id="basicInput" name="price4"
                                                    placeholder="Enter" value="{{ $show->price4 }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Qty</label>
                                                <input type="number" class="form-control" id="basicInput" name="qty4"
                                                    placeholder="Enter" value="{{ $show->qty4 }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 text-center mb-2 mt-1 pt-20">
                        <a href="{{ route('form-approve.index') }}" class="btn btn-outline-secondary me-1">Back</a>
                        <button type="submit" class="btn btn-success ">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection
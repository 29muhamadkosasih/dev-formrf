@extends('layouts/master')
@section('title', 'Home')
@section('content')

<!-- Invoice table -->
<div class="col-xl-12">
    <div class="row mb-5">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left"
                            src="{{ asset('assets/img/illustrations/WhatsApp Image 2023-08-02 at 10.54.10.jpeg') }}"
                            alt="Card image" />
                    </div>
                    <div class="col-md-8" style="background-color: #7367f0;">
                        <div class="card-body mt-5">
                            <h3 class="text-center" style="color: white">Hello {{ Auth::user()->name }},
                                how
                                can we help?</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-0">
        <!-- Navigation -->
        <div class="col-lg-3 col-md-4 col-12 mb-md-0 mb-3">
            <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
                <ul class="nav nav-align-left nav-pills flex-column">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payment">
                            <i class="ti ti-credit-card me-1 ti-sm"></i>
                            <span class="align-middle fw-semibold">Form Electronic (E-RF)</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#delivery">
                            <i class="ti ti-briefcase me-1 ti-sm"></i>
                            <span class="align-middle fw-semibold">Prosedur Umum</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cancellation">
                            <i class="ti ti-rotate-clockwise-2 me-1 ti-sm"></i>
                            <span class="align-middle fw-semibold">Membuat E-RF</span>
                        </button>
                    </li>
                    <li class="nav-item d-none">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders">
                            <i class="ti ti-box me-1 ti-sm"></i>
                            <span class="align-middle fw-semibold">Status E-RF</span>
                        </button>
                    </li>
                </ul>
                <div class="d-none d-md-block">
                    <div class="mt-4">
                        <img src="{{ asset('assets/img/illustrations/page-misc-under-maintenance.png') }}"
                            class="img-fluid" width="270" alt="FAQ Image" />
                    </div>
                </div>
            </div>
        </div>
        <!-- /Navigation -->

        <!-- FAQ's -->
        <div class="col-lg-9 col-md-8 col-12">
            <div class="tab-content py-0">
                <div class="tab-pane fade show active" id="payment" role="tabpanel">
                    <div class="d-flex mb-3 gap-3">
                        <div>
                            <span class="badge bg-label-primary rounded-2 p-2">
                                <i class="ti ti-credit-card ti-lg"></i>
                            </span>
                        </div>
                        <div>
                            <h4 class="mb-0">
                                <span class="align-middle">Form Electronic (E-RF)</span>
                            </h4>
                        </div>
                    </div>
                    <div id="accordionPayment" class="accordion">
                        <div class="card accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    aria-expanded="true" data-bs-target="#accordionPayment-1"
                                    aria-controls="accordionPayment-1">
                                    Pengajuan Permintaan Dana Melalui Form Electronic (E-RF)
                                </button>
                            </h2>

                            <div id="accordionPayment-1" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    Setiap Departemen/Karyawan yang hendak mengajukan dana untuk keperluannya wajib
                                    mengisi formulir E-RF.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="delivery" role="tabpanel">
                    <div class="d-flex mb-3 gap-3">
                        <div>
                            <span class="badge bg-label-primary rounded-2 p-2">
                                <i class="ti ti-briefcase ti-lg"></i>
                            </span>
                        </div>
                        <div>
                            <h4 class="mb-0">
                                <span class="align-middle">Prosedur Umum</span>
                            </h4>
                        </div>
                    </div>
                    <div id="accordionDelivery" class="accordion">
                        <div class="card accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    aria-expanded="true" data-bs-target="#accordionDelivery-1"
                                    aria-controls="accordionDelivery-1">
                                    Prosedur Umum Pengajuan Dana Secara Electronic
                                </button>
                            </h2>
                            <div id="accordionDelivery-1" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="ps-1 g-1 ms-3">
                                        <li class="mb-2">Mengisi formulir E-RF melalui laptop atau HP</li>
                                        <li class="mb-2">Formulir E-RF yang telah di ajukan akan di cek oleh atasan
                                            (SPV atau Manager)</li>
                                        <li class="mb-2">Jika atasan setuju, maka E-RF akan diteruskan ke bagian
                                            Finance untuk diproses</li>
                                        <li class="mb-2">Jika Finance setuju maka pengajuan akan diteruskan ke Kasir
                                            untuk dikeluarkan dananya</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cancellation" role="tabpanel">
                    <div class="d-flex mb-3 gap-3">
                        <div>
                            <span class="badge bg-label-primary rounded-2 p-2">
                                <i class="ti ti-rotate-clockwise-2 ti-lg"></i>
                            </span>
                        </div>
                        <div>
                            <h4 class="mb-0"><span class="align-middle">
                                    Membuat E-RF</span></h4>
                        </div>
                    </div>
                    <div id="accordionCancellation" class="accordion">
                        <div class="card accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    aria-expanded="true" data-bs-target="#accordionCancellation-1"
                                    aria-controls="accordionCancellation-1">
                                    Bagiamana Cara Membuat E-RF ?
                                </button>
                            </h2>

                            <div id="accordionCancellation-1" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="ps-1 g-1 ms-3">
                                        <li class="mb-2">Klik Menu Form</li>
                                        <li class="mb-2">Klik Button Create</li>
                                        <li class="mb-2">Nama anda (yang Login) sudah tercantum otomatis sebagai PIC
                                            yang megajukan E-RF</li>
                                        <li class="mb-2">Isi semua kolom sesuai dengan keperluan</li>
                                        <li class="mb-2">Isi pengajuan yang dibutuhkan (disediakan 8 item, jika item
                                            melebihi 8 dapat dibuatkan pengajiuan baru)</li>
                                        <li class="mb-2">Klick tombol “Submit” jika sudah selesai dan tunggu
                                            pengecekan dari atasan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionCancellation-2" aria-controls="accordionCancellation-2">
                                    Syarat & Ketentuan
                                </button>
                            </h2>
                            <div id="accordionCancellation-2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="ps-1 g-1 ms-3">
                                        <li class="mb-2">Jika pembayaran hendak dilakukan secara Transfer, maka perlu
                                            diinput Bank dan No. Rekening terlebih dulu di menu
                                            MASTER DATA – Bank & No. Rekening.</li>
                                        <li class="mb-2">Jika dana yang diberikan oleh kasir tidak sesuai dengan jumlah
                                            pengajuan, maka Kasir akan menginformasikan jumlah uang
                                            yang dibayar dan Pembuat E-RF wajib memberikan konfirmasi penerimaan melalui
                                            formulir pengajuan E-RF yang pernah dibuat.</li>
                                        <li class="mb-2">Jika kategori pengajuan secara Advance, maka sebelum dana
                                            dikembalikan atau dibuktikan dengan kuitansi/tanda terima
                                            pembayaran, maka status E-RF tersebut belumlah selesai, dan apabila telah
                                            diselesaikan semua, maka status E-RF tersebut
                                            sudah “Closed”</li>
                                        <li class="mb-2">10.Status E-RF yang belum closed wajib diselesaikan selambatnya
                                            2 (dua) minggu setelah dana diserahkan oleh Kasir. Jika
                                            belum diselesaikan, maka Dana Wajib dikembalikan ke Finance.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel">
                    <div class="d-flex mb-3 gap-3">
                        <div>
                            <span class="badge bg-label-primary rounded-2 p-2">
                                <i class="ti ti-box ti-lg"></i>
                            </span>
                        </div>
                        <div>
                            <h4 class="mb-0">
                                <span class="align-middle">Status E-RF</span>
                            </h4>
                        </div>
                    </div>
                    <div id="accordionOrders" class="accordion">
                        <div class="card accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    aria-expanded="true" data-bs-target="#accordionOrders-1"
                                    aria-controls="accordionOrders-1">
                                    Timeline Status E-RF
                                </button>
                            </h2>
                            <div id="accordionOrders-1" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="card-body pb-0">
                                        <ul class="timeline mb-0">
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-primary"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-3">
                                                        <h6 class="mb-0">Pending</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                                        <div>
                                                            <span>Pengajuan Baru</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-3">
                                                        <h6 class="mb-0">Reject</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                                        <div>
                                                            <span>Pengajuan Baru</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-danger"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header mb-3">
                                                        <h6 class="mb-0">Approve</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                                        <div>
                                                            <span>Pengajuan Baru</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent">
                                                <span class="timeline-point timeline-point-info"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header">
                                                        <h6 class="mb-0">Interview Schedule</h6>
                                                        <span class="text-muted">6th October</span>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                        Possimus quos, voluptates
                                                        voluptas rem veniam expedita.
                                                    </p>
                                                    <hr>
                                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="avatar me-3">
                                                                <img src="../../assets/img/avatars/6.png" alt="Avatar"
                                                                    class="rounded-circle">
                                                            </div>
                                                            <div>
                                                                <p class="mb-0">Rebecca Godman</p>
                                                                <span class="text-muted">Javascript Developer</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                                            <i class="ti ti-brand-hipchat me-2"></i>
                                                            <i class="ti ti-phone-call"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-item-transparent border-0">
                                                <span class="timeline-point timeline-point-warning"></span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header">
                                                        <h6 class="mb-0">2 Notifications</h6>
                                                        <span class="text-muted">7th October</span>
                                                    </div>
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                                            <div class="d-flex flex-wrap align-items-center">
                                                                <ul
                                                                    class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                                    <li data-bs-toggle="tooltip"
                                                                        data-popup="tooltip-custom"
                                                                        data-bs-placement="top"
                                                                        class="avatar avatar-xs pull-up"
                                                                        aria-label="Vinnie Mostowy"
                                                                        data-bs-original-title="Vinnie Mostowy">
                                                                        <img class="rounded-circle"
                                                                            src="../../assets/img/avatars/5.png"
                                                                            alt="Avatar">
                                                                    </li>
                                                                    <li data-bs-toggle="tooltip"
                                                                        data-popup="tooltip-custom"
                                                                        data-bs-placement="top"
                                                                        class="avatar avatar-xs pull-up"
                                                                        aria-label="Allen Rieske"
                                                                        data-bs-original-title="Allen Rieske">
                                                                        <img class="rounded-circle"
                                                                            src="../../assets/img/avatars/12.png"
                                                                            alt="Avatar">
                                                                    </li>
                                                                    <li data-bs-toggle="tooltip"
                                                                        data-popup="tooltip-custom"
                                                                        data-bs-placement="top"
                                                                        class="avatar avatar-xs pull-up"
                                                                        aria-label="Julee Rossignol"
                                                                        data-bs-original-title="Julee Rossignol">
                                                                        <img class="rounded-circle"
                                                                            src="../../assets/img/avatars/6.png"
                                                                            alt="Avatar">
                                                                    </li>
                                                                </ul>
                                                                <span>Commented on your post.</span>
                                                            </div>
                                                            <button
                                                                class="btn btn-outline-primary btn-sm my-sm-0 my-3 waves-effect">View</button>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="../../assets/img/avatars/4.png"
                                                                    class="rounded-circle me-3" alt="avatar" height="24"
                                                                    width="24">
                                                                <div class="user-info">
                                                                    <p class="my-0">Dwight repaid you</p>
                                                                    <span class="text-muted">30 minutes ago</span>
                                                                </div>
                                                            </div>
                                                            <h5 class="mb-0">$20</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /FAQ's -->
    </div>

</div>
<!-- /Invoice table -->

<!-- Content wrapper -->
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

</div>
<!-- / Content -->

<div class="content-backdrop fade"></div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
<!-- Content wrapper -->
@endsection

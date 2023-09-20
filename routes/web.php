<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FmanController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FspvController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\NoRekController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\CheckedController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RujukanController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\FapproveController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReportpbController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\PaymentInController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\InvoiceOutController;
use App\Http\Controllers\InvPaymentController;
use App\Http\Controllers\KpengajuanController;
use App\Http\Controllers\MancheckedController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ReportPPH23Controller;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [StaterkitController::class, 'home'])->name('home');
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);
    Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout.empty');
    Route::get('form/print/{id}', [FormController::class, 'print'])->name('form.print');
    Route::get('form/showDetail/{id}', [FormController::class, 'showDetail'])->name('form.showDetail');
    Route::get('form/showDetailGen/{id}', [DashboardController::class, 'showDetailGen'])->name('form.showDetailGen');
    Route::get('form/showDetailCek/{id}', [MancheckedController::class, 'showDetailCek'])->name('form.showDetailCek');
    Route::get('form/showDetailApp/{id}', [ApproveController::class, 'showDetailApp'])->name('form.showDetailApp');
    Route::get('form-list/print', [FormsController::class, 'printToday'])->name('form-list.print');
    Route::get('form/listAdvance', [FormController::class, 'listAdvance'])->name('listAdvance');
    Route::put('form-checked/checked/{id}', [CheckedController::class, 'checked'])->name('form-checked.checked');
    Route::get('form-checked/detail/{id}', [CheckedController::class, 'detail'])->name('form-checked.detail');
    Route::get('form-checked/detailman/{id}', [MancheckedController::class, 'detail'])->name('form-checkedman.detail');
    Route::put('form-approve/approve/{id}', [ApproveController::class, 'approve'])->name('form-approve.approve');
    Route::get('form-approve/detail/{id}', [ApproveController::class, 'detail'])->name('form-approve.detail');
    Route::get('form-approve/detail/{id}', [ApproveController::class, 'detail'])->name('form-approve.detail');
    Route::get('form-approve/view/{id}', [ApproveController::class, 'view'])->name('form-approve.view');
    Route::get('form-approve/viewDetail/{id}', [ApproveController::class, 'viewDetail'])->name('form-approve.viewDetail');
    Route::get('form-approve/viewDetailShow/{id}', [ApproveController::class, 'viewDetailShow'])->name('form-approve.viewDetailShow');
    Route::get('form/detail/{id}', [FormController::class, 'detail'])->name('form.detail');
    Route::get('formspv/detail/{id}', [FspvController::class, 'detail'])->name('form-spv.detail');
    Route::get('forman/detail/{id}', [FmanController::class, 'detail'])->name('form-man.detail');
    Route::get('formapp/detail/{id}', [FapproveController::class, 'detail'])->name('form-app.detail');
    Route::put('form/kPembayaran/{id}', [FormController::class, 'kPembayaran'])->name('form.kPembayaran');
    Route::put('formspv/kPembayaran/{id}', [FspvController::class, 'kPembayaran'])->name('form-spv.kPembayaran');
    Route::put('forman/kPembayaran/{id}', [FmanController::class, 'kPembayaran'])->name('form-man.kPembayaran');
    Route::put('formapp/kPembayaran/{id}', [FapproveController::class, 'kPembayaran'])->name('form-app.kPembayaran');
    Route::put('form-approve/process/{id}', [ApproveController::class, 'process'])->name('form-approve.process');
    Route::get('approve/konfirmasi/{id}', [FormController::class, 'konfirmasi']);
    Route::get('approve/konfirmasiRem/{id}', [FormController::class, 'konfirmasiRem']);
    Route::get('approvespv/konfirmasiRem/{id}', [FspvController::class, 'konfirmasiRem']);
    Route::get('approveman/konfirmasiRem/{id}', [FmanController::class, 'konfirmasiRem']);
    Route::get('approve/maker/{id}', [CheckedController::class, 'approve']);
    Route::get('approve/paid/{id}', [CheckedController::class, 'paid']);
    Route::get('reject/maker/{id}', [CheckedController::class, 'reject']);
    Route::get('approve/maker/{id}', [MancheckedController::class, 'approve']);
    Route::get('approve/paid/{id}', [MancheckedController::class, 'paid']);
    Route::get('reject/maker/{id}', [MancheckedController::class, 'reject']);
    Route::get('approve/approve/{id}', [ApproveController::class, 'approve']);
    Route::get('reject/reject/{id}', [ApproveController::class, 'reject']);
    Route::get('form-list/list', [FormsController::class, 'list'])->name('list');
    Route::get('form-list/today', [FormsController::class, 'today'])->name('today');
    Route::get('form-list/resumeRf', [FormsController::class, 'resumeRf'])->name('resumeRf');
    Route::get('form-list/reportPB', [FormsController::class, 'reportPB'])->name('reportPB');
    Route::get('dashboard-checked', [DashboardController::class, 'checked'])->name('dashboard.checked');
    Route::get('dashboard-approve', [DashboardController::class, 'approve'])->name('dashboard.approve');
    Route::get('dashboard-general', [DashboardController::class, 'general'])->name('dashboard.general');
    Route::post('getLaporanDay', [FormsController::class, 'getLaporanDay'])->name('laporan.getLaporanDay');
    Route::post('getLaporan', [FormsController::class, 'getLaporan'])->name('laporan.getLaporan');
    Route::post('import-file', [InvPaymentController::class, 'import'])->name('import');
    Route::get('export_excel', [UserController::class, 'export_excel'])->name('export_excel');
    Route::get('export_excel/formrf', [FormsController::class, 'export_excelFormrf'])->name('export_excel.formrf');
    Route::post('form-list/today', [ReportpbController::class, 'saldoStore'])->name('saldoStore');
    Route::get('form/download/{file}', [FormController::class, 'download'])->name('form.download');
    Route::get('form/download-spv/{file}', [FspvController::class, 'download'])->name('form-spv.download');
    Route::get('form/download-man/{file}', [FmanController::class, 'download'])->name('form-man.download');
    Route::get('form/download-app/{file}', [FapproveController::class, 'download'])->name('form-app.download');
    Route::get('/print', [ReportpbController::class, 'showPrintView']);
    Route::get('paymentIn/report', [PaymentInController::class, 'report'])->name('paymentIn.report');
    Route::get('invoiceOut/report', [InvoiceOutController::class, 'report'])->name('invoiceOut.report');
    Route::get('export_excel/reportpph', [ReportPPH23Controller::class, 'export_excel'])->name('export_excel.reportpph');
    Route::get('export_pdf/reportpph', [ReportPPH23Controller::class, 'export_pdf'])->name('export_pdf');
    Route::post('getLaporan/reportpph', [ReportPPH23Controller::class, 'getLaporan'])->name('laporan.getLaporan.reportpph');
    Route::post('getLaporan/InvPayment', [InvPaymentController::class, 'getLaporan'])->name('laporan.getLaporan.InvPayment');
    Route::get('/pegawai/cetak_pdf', [FormsController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('/pegawai/cetak_pdf2/{from}/{to}', [FormsController::class, 'cetak_pdf2'])->name('cetak_pdf2');
    Route::get('/pegawai/cetak_pdfDay/{date}', [FormsController::class, 'cetak_pdfDay'])->name('cetak_pdfDay');
    Route::get('/pegawai/cetak_pdfpb', [FormsController::class, 'cetak_pdfpb'])->name('cetak_pdfpb');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class)->except(['show']);
    Route::resource('bank', BankController::class);
    Route::resource('norek', NoRekController::class);
    Route::resource('form', FormController::class);
    Route::resource('reportPB', ReportpbController::class);
    Route::resource('form-approve', ApproveController::class);
    Route::resource('form-checked', CheckedController::class);
    Route::resource('form-list', FormsController::class);
    Route::resource('me', ProfileController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('keperluan', KeperluanController::class);
    Route::resource('kpengajuan', KpengajuanController::class);
    Route::resource('rujukan', RujukanController::class);
    Route::resource('invoiceOut', InvoiceOutController::class);
    Route::resource('paymentIn', PaymentInController::class);
    Route::resource('cashflow', CashFlowController::class);
    Route::resource('revenue', RevenueController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('departement', DepartementController::class);
    Route::resource('reportpph', ReportPPH23Controller::class);
    Route::resource('invpayment', InvPaymentController::class);
    Route::resource('form-spv', FspvController::class);
    Route::resource('form-man', FmanController::class);
    Route::resource('form-app', FapproveController::class);
    Route::resource('form-checkedman', MancheckedController::class);
});
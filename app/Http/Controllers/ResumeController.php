<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('resume.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $data = Resume::where('status', 1)->get();
        $inputHariIni = Resume::whereDate('tgl_resume', Carbon::today())->exists();
        $showButton = $data->count() > 0;
        return view('pages.cash-flow.resume.index', [
            'data'  => $data,
            'showButton'  => $showButton,
            'inputHariIni'  => $inputHariIni,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create2()
    // {
    //     $date = Carbon::now();
    //     $tanggalKemarin = Carbon::now()->subDay()->toDateString();
    //     $dataKemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('rs_total')
    //         ->first();
    //     // dd($dataKemarin);
    //     $dataKemarin2 = ($dataKemarin !== null) ? $dataKemarin->rs_total : 0;

    //     $dataKemarinAK = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_total')
    //         ->first();
    //     $dataKemarinAK = ($dataKemarinAK !== null) ? $dataKemarinAK->ak_total : 0;

    //     $dataKemarinPB = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_total')
    //         ->first();
    //     $dataKemarinPB = ($dataKemarinPB !== null) ? $dataKemarinPB->pb_total : 0;


    //     $dataKemarin_cb_petty_cash = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_petty_cash')
    //         ->first();
    //     $dataKemarin_cb_petty_cash = ($dataKemarin_cb_petty_cash !== null) ? $dataKemarin_cb_petty_cash->cb_petty_cash : 0;

    //     $dataKemarin_cb_mandiri_opr = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_opr')
    //         ->first();
    //     $dataKemarin_cb_mandiri_opr = ($dataKemarin_cb_mandiri_opr !== null) ? $dataKemarin_cb_mandiri_opr->cb_mandiri_opr : 0;


    //     $dataKemarin_cb_mandiri_giro = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_giro')
    //         ->first();
    //     $dataKemarin_cb_mandiri_giro = ($dataKemarin_cb_mandiri_giro !== null) ? $dataKemarin_cb_mandiri_giro->cb_mandiri_giro : 0;


    //     $dataKemarin_cb_mandiri_lsp = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_lsp')
    //         ->first();
    //     $dataKemarin_cb_mandiri_lsp = ($dataKemarin_cb_mandiri_lsp !== null) ? $dataKemarin_cb_mandiri_lsp->cb_mandiri_lsp : 0;


    //     $dataKemarin_cb_mandiri_batam = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_batam')
    //         ->first();
    //     $dataKemarin_cb_mandiri_batam = ($dataKemarin_cb_mandiri_batam !== null) ? $dataKemarin_cb_mandiri_batam->cb_mandiri_batam : 0;


    //     $dataKemarin_cb_mandiri_cadangan = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_cadangan')
    //         ->first();
    //     $dataKemarin_cb_mandiri_cadangan = ($dataKemarin_cb_mandiri_cadangan !== null) ? $dataKemarin_cb_mandiri_cadangan->cb_mandiri_cadangan : 0;


    //     $data_kemarin_so_outstanding = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('so_outstanding_total')
    //         ->first();
    //     $data_kemarin_so_outstanding = ($data_kemarin_so_outstanding !== null) ? $data_kemarin_so_outstanding->so_outstanding_total : 0;


    //     $dataKemarin_899_to_893 = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_899_893')
    //         ->first();
    //     $dataKemarin_899_to_893 = ($dataKemarin_899_to_893 !== null) ? $dataKemarin_899_to_893->pb_899_893 : 0;

    //     $dataKemarin_893_to_899 = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_893_899')
    //         ->first();
    //     $dataKemarin_893_to_899 = ($dataKemarin_893_to_899 !== null) ? $dataKemarin_893_to_899->pb_893_899 : 0;

    //     $dataKemarin_keluar = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_keluar')
    //         ->first();
    //     $dataKemarin_keluar = ($dataKemarin_keluar !== null) ? $dataKemarin_keluar->ak_keluar : 0;

    //     $dataKemarin_masuk = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_masuk')
    //         ->first();
    //     $dataKemarin_masuk = ($dataKemarin_masuk !== null) ? $dataKemarin_masuk->ak_masuk : 0;




    //     return view('pages.cash-flow.resume.create', [
    //         'date'   => $date,
    //         'dataKemarin2'   => $dataKemarin2,
    //         'dataKemarinAK'   => $dataKemarinAK,
    //         'dataKemarinPB'   => $dataKemarinPB,
    //         'dataKemarin_cb_petty_cash'   => $dataKemarin_cb_petty_cash,
    //         'dataKemarin_cb_mandiri_opr'   => $dataKemarin_cb_mandiri_opr,
    //         'dataKemarin_cb_mandiri_giro'   => $dataKemarin_cb_mandiri_giro,
    //         'dataKemarin_cb_mandiri_lsp'   => $dataKemarin_cb_mandiri_lsp,
    //         'dataKemarin_cb_mandiri_batam'   => $dataKemarin_cb_mandiri_batam,
    //         'dataKemarin_cb_mandiri_cadangan'   => $dataKemarin_cb_mandiri_cadangan,
    //         'data_kemarin_so_outstanding'   => $data_kemarin_so_outstanding,
    //         'dataKemarin_899_to_893'   => $dataKemarin_899_to_893,
    //         'dataKemarin_893_to_899'   => $dataKemarin_893_to_899,
    //         'dataKemarin_keluar'   => $dataKemarin_keluar,
    //         'dataKemarin_masuk'   => $dataKemarin_masuk,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     $tanggalKemarin = Carbon::yesterday();

    //     $data = $request->cb_petty_cash;
    //     if ($data == NULL) {
    //         $cb_petty_cash = NULL;
    //     } else {
    //         $cb_petty_cash = str_replace('.', '', $data);
    //     }

    //     $data2 = $request->cb_mandiri_opr;
    //     if ($data == NULL) {
    //         $cb_mandiri_opr = NULL;
    //     } else {
    //         $cb_mandiri_opr = str_replace('.', '', $data2);
    //     }

    //     $data3 = $request->cb_mandiri_giro;
    //     if ($data3 == NULL) {
    //         $cb_mandiri_giro = NULL;
    //     } else {
    //         $cb_mandiri_giro = str_replace('.', '', $data3);
    //     }

    //     $data4 = $request->cb_mandiri_lsp;
    //     if ($data4 == NULL) {
    //         $cb_mandiri_lsp = NULL;
    //     } else {
    //         $cb_mandiri_lsp = str_replace('.', '', $data4);
    //     }

    //     $data5 = $request->cb_mandiri_batam;
    //     if ($data5 == NULL) {
    //         $cb_mandiri_batam = NULL;
    //     } else {
    //         $cb_mandiri_batam = str_replace('.', '', $data5);
    //     }

    //     $data6 = $request->cb_mandiri_cadangan;
    //     if ($data6 == NULL) {
    //         $cb_mandiri_cadangan = NULL;
    //     } else {
    //         $cb_mandiri_cadangan = str_replace('.', '', $data6);
    //     }

    //     $data7 = $request->rs_total_today;
    //     if ($data7 == NULL) {
    //         $rs_total_today = NULL;
    //     } else {
    //         $rs_total_today = str_replace('.', '', $data7);
    //     }

    //     $data8 = $request->ak_masuk;
    //     if ($data8 == NULL) {
    //         $ak_masuk = NULL;
    //     } else {
    //         $ak_masuk = str_replace('.', '', $data8);
    //     }


    //     $data9 = $request->ak_keluar;
    //     if ($data9 == NULL) {
    //         $ak_keluar = NULL;
    //     } else {
    //         $ak_keluar = str_replace('.', '', $data9);
    //     }

    //     $data10 = $request->pb_899_893;
    //     if ($data10 == NULL) {
    //         $pb_899_893 = NULL;
    //     } else {
    //         $pb_899_893 = str_replace('.', '', $data10);
    //     }

    //     $data11 = $request->pb_893_899;
    //     if ($data11 == NULL) {
    //         $pb_893_899 = NULL;
    //     } else {
    //         $pb_893_899 = str_replace('.', '', $data11);
    //     }



    //     $dataKemarin_cb_petty_cash = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_petty_cash')
    //         ->first();
    //     $dataKemarin_cb_petty_cash = ($dataKemarin_cb_petty_cash !== null) ? $dataKemarin_cb_petty_cash->cb_petty_cash : 0;

    //     $dataKemarin_cb_mandiri_opr = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_opr')
    //         ->first();
    //     $dataKemarin_cb_mandiri_opr = ($dataKemarin_cb_mandiri_opr !== null) ? $dataKemarin_cb_mandiri_opr->cb_mandiri_opr : 0;


    //     $dataKemarin_cb_mandiri_giro = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_giro')
    //         ->first();
    //     $dataKemarin_cb_mandiri_giro = ($dataKemarin_cb_mandiri_giro !== null) ? $dataKemarin_cb_mandiri_giro->cb_mandiri_giro : 0;


    //     $dataKemarin_cb_mandiri_lsp = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_lsp')
    //         ->first();
    //     $dataKemarin_cb_mandiri_lsp = ($dataKemarin_cb_mandiri_lsp !== null) ? $dataKemarin_cb_mandiri_lsp->cb_mandiri_lsp : 0;


    //     $dataKemarin_cb_mandiri_batam = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_batam')
    //         ->first();
    //     $dataKemarin_cb_mandiri_batam = ($dataKemarin_cb_mandiri_batam !== null) ? $dataKemarin_cb_mandiri_batam->cb_mandiri_batam : 0;


    //     $dataKemarin_cb_mandiri_cadangan = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('cb_mandiri_cadangan')
    //         ->first();
    //     $dataKemarin_cb_mandiri_cadangan = ($dataKemarin_cb_mandiri_cadangan !== null) ? $dataKemarin_cb_mandiri_cadangan->cb_mandiri_cadangan : 0;

    //     $cb_total_today = $cb_petty_cash + $cb_mandiri_opr + $cb_mandiri_giro + $cb_mandiri_lsp + $cb_mandiri_batam + $cb_mandiri_cadangan;
    //     $cb_total_kemarin = $dataKemarin_cb_petty_cash + $dataKemarin_cb_mandiri_opr + $dataKemarin_cb_mandiri_giro + $dataKemarin_cb_mandiri_lsp + $dataKemarin_cb_mandiri_batam + $dataKemarin_cb_mandiri_cadangan;
    //     $cb_total =   $cb_total_today  + $cb_total_kemarin;
    //     //revenue san sales
    //     $dataKemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('rs_total')
    //         ->first();
    //     $dataKemarin2 = ($dataKemarin !== null) ? $dataKemarin->rs_total : 0;
    //     $rs_total = $dataKemarin2 + $rs_total_today;

    //     //Arus Kas
    //     $dataKemarinAK = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_total')
    //         ->first();

    //     $data_kemarin_ak_masuk = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_masuk')
    //         ->first();
    //     $data_kemarin_ak_masuk = ($data_kemarin_ak_masuk !== null) ? $data_kemarin_ak_masuk->ak_masuk : 0;

    //     $data_kemarin_ak_keluar = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('ak_keluar')
    //         ->first();
    //     // dd($data_kemarin_ak_keluar);
    //     $data_kemarin_ak_keluar = ($data_kemarin_ak_keluar !== null) ? $data_kemarin_ak_keluar->ak_keluar : 0;

    //     $total_data_kemarin =  $data_kemarin_ak_masuk + $data_kemarin_ak_keluar;
    //     $dataKemarin2AK = ($dataKemarinAK !== null) ? $dataKemarinAK->ak_total : 0;
    //     $ak_total_today = $ak_masuk + $ak_keluar;
    //     $ak_total = $ak_total_today + $dataKemarin2AK;

    //     $ak_total_keluar = $data_kemarin_ak_keluar + $ak_keluar;
    //     $ak_total_masuk = $data_kemarin_ak_masuk + $ak_masuk;
    //     //jumlah arus kas masuk + arus kas keluar + jumlah total kemarin

    //     // PB/ Overbooking
    //     $dataKemarinPB = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_total')
    //         ->first();
    //     $dataKemarin2PB = ($dataKemarinPB !== null) ? $dataKemarinPB->pb_total : 0;
    //     $pb_total_today = $pb_899_893 + $pb_893_899;
    //     $pb_total = $pb_total_today + $dataKemarin2PB;



    //     $data_kemarin_pb_899_893 = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_899_893')
    //         ->first();
    //     $data_kemarin_pb_899_893 = ($data_kemarin_pb_899_893 !== null) ? $data_kemarin_pb_899_893->pb_899_893 : 0;

    //     $data_kemarin_pb_893_899 = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('pb_893_899')
    //         ->first();
    //     $data_kemarin_pb_893_899 = ($data_kemarin_pb_893_899 !== null) ? $data_kemarin_pb_893_899->pb_893_899 : 0;
    //     $total_data_kemarin_pb =  $data_kemarin_pb_899_893 + $data_kemarin_pb_893_899;
    //     $pb_total_893_899 = $data_kemarin_pb_893_899 + $pb_893_899;
    //     $pb_total_899_893 = $data_kemarin_pb_899_893 + $pb_899_893;


    //     $data12 = $request->so_outstanding;
    //     if ($data12 == NULL) {
    //         $so_outstanding = NULL;
    //     } else {
    //         $so_outstanding = str_replace('.', '', $data12);
    //     }

    //     $data13 = $request->so_adjusment_invoice;
    //     if ($data13 == NULL) {
    //         $so_adjusment_invoice = NULL;
    //     } else {
    //         $so_adjusment_invoice = str_replace('.', '', $data13);
    //     }


    //     $data14 = $request->so_invoice_out;
    //     if ($data14 == NULL) {
    //         $so_invoice_out = NULL;
    //     } else {
    //         $so_invoice_out = str_replace('.', '', $data14);
    //     }

    //     $data15 = $request->so_prepaid_tax;
    //     if ($data15 == NULL) {
    //         $so_prepaid_tax = NULL;
    //     } else {
    //         $so_prepaid_tax = str_replace('.', '', $data15);
    //     }

    //     $data16 = $request->so_paid_today;
    //     if ($data16 == NULL) {
    //         $so_paid_today = NULL;
    //     } else {
    //         $so_paid_today = str_replace('.', '', $data16);
    //     }
    //     $data_kemarin_so_outstanding = Resume::whereDate('tgl_resume', $tanggalKemarin)
    //         ->orderBy('tgl_resume', 'desc')
    //         ->select('so_outstanding_total')
    //         ->first();

    //     $data_kemarin_so_outstanding = ($data_kemarin_so_outstanding !== null) ? $data_kemarin_so_outstanding->so_outstanding_total : 0;
    //     // $ab = $data_kemarin_so_outstanding - $so_adjusment_invoice + $so_invoice_out - $so_prepaid_tax - $so_paid_today;
    //     $dataKemarin_total_so = $data_kemarin_so_outstanding - $so_adjusment_invoice + $so_invoice_out - $so_prepaid_tax - $so_paid_today;
    //     // dd($dataKemarin_total_so);


    //     $g_l = $dataKemarin_cb_petty_cash + $dataKemarin_cb_mandiri_opr + $dataKemarin_cb_mandiri_giro + $dataKemarin_cb_mandiri_lsp + $dataKemarin_cb_mandiri_batam + $dataKemarin_cb_mandiri_cadangan;
    //     // dd($g_l);
    //     $a_f =  $cb_petty_cash + $cb_mandiri_opr + $cb_mandiri_giro + $cb_mandiri_lsp + $cb_mandiri_batam + $cb_mandiri_cadangan;
    //     // dd($a_f);
    //     $total_g_l_a_f = $g_l + $a_f;
    //     // dd($total_g_l_a_f);

    //     $ovb_899_893 = $pb_899_893 + $data_kemarin_pb_899_893;
    //     // dd($ovb_899_893);
    //     $ovb_893_899 = $pb_893_899 + $data_kemarin_pb_893_899;
    //     // dd($ovb_893_899);

    //     $ovb_total = $ovb_899_893 + $ovb_893_899;
    //     // dd($ovb_total);


    //     // revenue sales resume

    //     $total_revenue_sales =  $dataKemarin2 +  $rs_total_today;
    //     // dd($total_revenue_sales);

    //     // expanse
    //     $total_ex_keluar = $data_kemarin_ak_keluar + $ak_keluar;
    //     // dd($total_ex_keluar);
    //     $total_ex_masuk = $data_kemarin_ak_masuk + $ak_masuk;

    //     // outstanding

    //     $total_outsatnding = $data_kemarin_so_outstanding - $so_adjusment_invoice + $so_invoice_out - $so_prepaid_tax - $so_paid_today;
    //     // dd($total_outsatnding);

    //     // profit / losss

    //     $total_profit_loss = $total_ex_masuk  - $total_ex_keluar;
    //     // dd($total_profit_loss);

    //     $rasio_total = $total_g_l_a_f + $total_outsatnding;

    //     // $rasio_total_revenue = $request->rasio_total_revenue;
    //     // $rasio_account_payable = $request->rasio_account_payable;

    //     $data20 = $request->rasio_total_revenue;
    //     if ($data20 == NULL) {
    //         $rasio_total_revenue = NULL;
    //     } else {
    //         $rasio_total_revenue = str_replace('.', '', $data20);
    //     }

    //     $data21 = $request->rasio_account_payable;
    //     if ($data21 == NULL) {
    //         $rasio_account_payable = NULL;
    //     } else {
    //         $rasio_account_payable = str_replace('.', '', $data21);
    //     }

    //     $rasio_rasio = $rasio_total + $rasio_total_revenue + $rasio_account_payable;

    //     $rasio_until_6_month = $rasio_rasio / 6;
    //     $rasio_rata_rata_expense = $rasio_rasio / 750000000;

    //     // dd($request->all());
    //     Resume::create([
    //         'tgl_resume' => $request->tgl_resume,
    //         'cb_petty_cash' => $cb_petty_cash,
    //         'cb_petty_cash_kemarin' => $dataKemarin_cb_petty_cash,
    //         'cb_mandiri_opr' => $cb_mandiri_opr,
    //         'cb_mandiri_opr_kemarin' => $dataKemarin_cb_mandiri_opr,
    //         'cb_mandiri_giro' => $cb_mandiri_giro,
    //         'cb_mandiri_giro_kemarin' => $dataKemarin_cb_mandiri_giro,
    //         'cb_mandiri_lsp' => $cb_mandiri_lsp,
    //         'cb_mandiri_lsp_kemarin' => $dataKemarin_cb_mandiri_lsp,
    //         'cb_mandiri_batam' => $cb_mandiri_batam,
    //         'cb_mandiri_batam_kemarin' => $dataKemarin_cb_mandiri_batam,
    //         'cb_mandiri_cadangan' => $cb_mandiri_cadangan,
    //         'cb_mandiri_cadangan_kemarin' => $dataKemarin_cb_mandiri_cadangan,
    //         'cb_total_today' => $cb_total_today,
    //         'cb_total_kemarin' => $cb_total_kemarin,
    //         'cb_total' => $cb_total,
    //         'rs_total_today' => $rs_total_today,
    //         'rs_total_kemarin' => $dataKemarin2,
    //         'rs_total' => $rs_total,
    //         'ak_masuk' => $ak_masuk,
    //         'ak_masuk_kemarin' => $data_kemarin_ak_masuk,
    //         'ak_keluar' => $ak_keluar,
    //         'ak_keluar_kemarin' => $data_kemarin_ak_keluar,
    //         'ak_total_today' => $ak_total_today,
    //         'ak_total_kemarin' => $total_data_kemarin,
    //         'ak_total_keluar' => $ak_total_keluar,
    //         'ak_total_masuk' => $ak_total_masuk,
    //         'ak_total' => $ak_total,
    //         'pb_899_893'  => $pb_899_893,
    //         'pb_899_893_kemarin'  => $data_kemarin_pb_899_893,
    //         'pb_893_899'  => $pb_893_899,
    //         'pb_893_899_kemarin'  => $data_kemarin_pb_893_899,
    //         'pb_total_today'  => $pb_total_today,
    //         'pb_total_kemarin'  => $total_data_kemarin_pb,
    //         'pb_total'  => $pb_total,
    //         'pb_total_899_893'  => $pb_total_899_893,
    //         'pb_total_893_899'  => $pb_total_893_899,
    //         'so_adjusment_invoice'  => $so_adjusment_invoice,
    //         'so_invoice_out'  => $so_invoice_out,
    //         'so_prepaid_tax'  => $so_prepaid_tax,
    //         'so_paid_today'  => $so_paid_today,
    //         'so_outstanding_kemarin'  => $data_kemarin_so_outstanding,
    //         'so_outstanding_total'  => $dataKemarin_total_so,
    //         'resume_cash_bank'  => $total_g_l_a_f,
    //         'resume_ovb_899_893'  => $ovb_899_893,
    //         'resume_ovb_893_899'  => $ovb_893_899,
    //         'resume_total_ovb'  => $ovb_total,
    //         'resume_expanses'  => $total_ex_keluar,
    //         'resume_outstanding'  => $total_outsatnding,
    //         'resume_profit_los'  => $total_profit_loss,
    //         'resume_revenue_sales'  => $total_revenue_sales,
    //         'rasio_cash_bank'  => $total_g_l_a_f,
    //         'rasio_outstanding'  => $total_outsatnding,
    //         'rasio_total'  => $rasio_total,
    //         'rasio_total_revenue'  => $rasio_total_revenue,
    //         'rasio_account_payable'  => $rasio_account_payable,
    //         'rasio_rasio'  => $rasio_rasio,
    //         'rasio_until_6_month'  => $rasio_until_6_month,
    //         'rasio_rata_rata_expense'  => $rasio_rata_rata_expense,
    //     ]);
    //     return redirect()->route('resume.pra-store');
    // }

    public function store(Request $request)
    {
        Resume::create($request->all());
        return redirect()->route('resume.get');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Resume::find($id);
        $date = Carbon::now();
        $tanggalKemarin = Carbon::yesterday();
        $dataKemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('rs_total')
            ->first();
        $dataKemarin2 = ($dataKemarin !== null) ? $dataKemarin->rs_total : 0;

        $a = $show->ak_total_today;
        $b = $show->ak_total_kemarin;
        $totalTodayKemarin = $a + $b;
        return view('pages.cash-flow.resume.show', [
            'show'  => $show,
            'date'  => $date,
            'dataKemarin2'  => $dataKemarin2,
            'totalTodayKemarin'  => $totalTodayKemarin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Resume::find($id);
        $tgl = $edit->tgl_resume;
        $tanggalKemarinYESR = Carbon::parse($tgl)->subDay()->toDateString();
        $tanggalKemarin = Carbon::parse($tgl)->subDay()->toDateString();
        $dataKemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('rs_total')
            ->first();
        $dataKemarin2 = ($dataKemarin !== null) ? $dataKemarin->rs_total : 0;
        // dd($dataKemarin2);

        $dataKemarinAK = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_total')
            ->first();
        $dataKemarinAK = ($dataKemarinAK !== null) ? $dataKemarinAK->ak_total : 0;

        $dataKemarinPB = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_total')
            ->first();
        $dataKemarinPB = ($dataKemarinPB !== null) ? $dataKemarinPB->pb_total : 0;


        $dataKemarin_cb_petty_cash = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_petty_cash')
            ->first();
        $dataKemarin_cb_petty_cash = ($dataKemarin_cb_petty_cash !== null) ? $dataKemarin_cb_petty_cash->cb_petty_cash : 0;

        $dataKemarin_cb_mandiri_opr = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_opr')
            ->first();
        $dataKemarin_cb_mandiri_opr = ($dataKemarin_cb_mandiri_opr !== null) ? $dataKemarin_cb_mandiri_opr->cb_mandiri_opr : 0;


        $dataKemarin_cb_mandiri_giro = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_giro')
            ->first();
        $dataKemarin_cb_mandiri_giro = ($dataKemarin_cb_mandiri_giro !== null) ? $dataKemarin_cb_mandiri_giro->cb_mandiri_giro : 0;


        $dataKemarin_cb_mandiri_lsp = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_lsp')
            ->first();
        $dataKemarin_cb_mandiri_lsp = ($dataKemarin_cb_mandiri_lsp !== null) ? $dataKemarin_cb_mandiri_lsp->cb_mandiri_lsp : 0;


        $dataKemarin_cb_mandiri_batam = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_batam')
            ->first();
        $dataKemarin_cb_mandiri_batam = ($dataKemarin_cb_mandiri_batam !== null) ? $dataKemarin_cb_mandiri_batam->cb_mandiri_batam : 0;


        $dataKemarin_cb_mandiri_cadangan = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_cadangan')
            ->first();
        $dataKemarin_cb_mandiri_cadangan = ($dataKemarin_cb_mandiri_cadangan !== null) ? $dataKemarin_cb_mandiri_cadangan->cb_mandiri_cadangan : 0;


        $data_kemarin_so_outstanding = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('so_outstanding_total')
            ->first();
        $data_kemarin_so_outstanding = ($data_kemarin_so_outstanding !== null) ? $data_kemarin_so_outstanding->so_outstanding_total : 0;


        $dataKemarin_899_to_893 = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_899_893')
            ->first();
        $dataKemarin_899_to_893 = ($dataKemarin_899_to_893 !== null) ? $dataKemarin_899_to_893->pb_899_893 : 0;

        $dataKemarin_893_to_899 = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_893_899')
            ->first();
        $dataKemarin_893_to_899 = ($dataKemarin_893_to_899 !== null) ? $dataKemarin_893_to_899->pb_893_899 : 0;

        $dataKemarin_keluar = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_keluar')
            ->first();
        $dataKemarin_keluar = ($dataKemarin_keluar !== null) ? $dataKemarin_keluar->ak_keluar : 0;

        $dataKemarin_masuk = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_masuk')
            ->first();
        $dataKemarin_masuk = ($dataKemarin_masuk !== null) ? $dataKemarin_masuk->ak_masuk : 0;


        // Menghitung tanggal satu hari sebelumnya
        $tanggalSebelumnya = Carbon::parse($edit->created_at)->subDay()->toDateString();

        // Mengambil data dari satu hari sebelumnya
        $dataSebelumnya = Resume::whereDate('tgl_resume', $tanggalSebelumnya)->get();

        return view('pages.cash-flow.resume.create', [
            'tanggalKemarinYESR'          => $tanggalKemarinYESR,
            'edit'          => $edit,
            'dataSebelumnya'          => $dataSebelumnya,
            'dataKemarin2'   => $dataKemarin2,
            'dataKemarinAK'   => $dataKemarinAK,
            'dataKemarinPB'   => $dataKemarinPB,
            'dataKemarin_cb_petty_cash'   => $dataKemarin_cb_petty_cash,
            'dataKemarin_cb_mandiri_opr'   => $dataKemarin_cb_mandiri_opr,
            'dataKemarin_cb_mandiri_giro'   => $dataKemarin_cb_mandiri_giro,
            'dataKemarin_cb_mandiri_lsp'   => $dataKemarin_cb_mandiri_lsp,
            'dataKemarin_cb_mandiri_batam'   => $dataKemarin_cb_mandiri_batam,
            'dataKemarin_cb_mandiri_cadangan'   => $dataKemarin_cb_mandiri_cadangan,
            'data_kemarin_so_outstanding'   => $data_kemarin_so_outstanding,
            'dataKemarin_899_to_893'   => $dataKemarin_899_to_893,
            'dataKemarin_893_to_899'   => $dataKemarin_893_to_899,
            'dataKemarin_keluar'   => $dataKemarin_keluar,
            'dataKemarin_masuk'   => $dataKemarin_masuk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Resume::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Success ! Data Berhasil di Hapus');
    }

    public function laporan()
    {
        $data = Resume::all();
        $show = Resume::all();
        $revenue = Resume::all();
        $pb = Resume::all();

        $totalCbTotal = Resume::sum('cb_total');

        // dd($data);
        return view('pages.cash-flow.resume.laporan', [
            'data'  => $data,
            'show'  => $show,
            'totalCbTotal'  => $totalCbTotal,
            'revenue'  => $revenue,
            'pb'  => $pb,
        ]);
    }

    public function get()
    {
        $data = Resume::latest()
            ->limit(1)
            ->get();

        return view('pages.cash-flow.resume.get', [
            'data'   => $data,
        ]);
    }

    public function preView(Request $request, $id)
    {
        $edit = Resume::find($id);
        $tgl = $edit->tgl_resume;
        $tanggalKemarinYESR = Carbon::parse($tgl)->subDay()->toDateString();
        $tanggalKemarin = Carbon::parse($tgl)->subDay()->toDateString();


        $tanggalSebelumnya = Carbon::parse($edit->tgl_resume)->subDay()->toDateString();
        // dd($tanggalSebelumnya);
        $dataKemarinPB = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_total')
            ->first();
        $dataKemarinPB = ($dataKemarinPB !== null) ? $dataKemarinPB->pb_total : 0;


        // get cb_petty_cash kemarin
        $dataKemarin_cb_petty_cash = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_petty_cash_kemarin')
            ->first();
        $dataKemarin_cb_petty_cash = ($dataKemarin_cb_petty_cash !== null) ? $dataKemarin_cb_petty_cash->cb_petty_cash_kemarin : 0;

        // get cb_mandiri_opr kemarin
        $dataKemarin_cb_mandiri_opr = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_opr_kemarin')
            ->first();
        $dataKemarin_cb_mandiri_opr = ($dataKemarin_cb_mandiri_opr !== null) ? $dataKemarin_cb_mandiri_opr->cb_mandiri_opr_kemarin : 0;

        // get cb_mandiri_giro kemarin
        $dataKemarin_cb_mandiri_giro = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_giro_kemarin')
            ->first();
        $dataKemarin_cb_mandiri_giro = ($dataKemarin_cb_mandiri_giro !== null) ?
            $dataKemarin_cb_mandiri_giro->cb_mandiri_giro_kemarin : 0;

        // get cb_mandiri_lsp kemarin
        $dataKemarin_cb_mandiri_lsp = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_lsp_kemarin')
            ->first();
        $dataKemarin_cb_mandiri_lsp = ($dataKemarin_cb_mandiri_lsp !== null) ?
            $dataKemarin_cb_mandiri_lsp->cb_mandiri_lsp_kemarin : 0;


        // get cb_mandiri_batam kemarin
        $dataKemarin_cb_mandiri_batam = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_batam_kemarin')
            ->first();
        $dataKemarin_cb_mandiri_batam = ($dataKemarin_cb_mandiri_batam !== null) ?
            $dataKemarin_cb_mandiri_batam->cb_mandiri_batam_kemarin : 0;


        // get cb_mandiri_cadangan kemarin
        $dataKemarin_cb_mandiri_cadangan = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_cadangan_kemarin')
            ->first();
        $dataKemarin_cb_mandiri_cadangan = ($dataKemarin_cb_mandiri_cadangan !== null) ?
            $dataKemarin_cb_mandiri_cadangan->cb_mandiri_cadangan_kemarin : 0;


        // get so_outstanding_kemarin kemarin
        $so_outstanding_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('so_outstanding_total')
            ->first();
        $so_outstanding_kemarin = ($so_outstanding_kemarin !== null) ?
            $so_outstanding_kemarin->so_outstanding_total : 0;




        $data_kemarin_so_outstanding = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('so_outstanding_total')
            ->first();
        $data_kemarin_so_outstanding = ($data_kemarin_so_outstanding !== null) ? $data_kemarin_so_outstanding->so_outstanding_total : 0;


        $dayOfMonth = Carbon::parse($tgl)->day;
        // Mendapatkan tanggal kemarin
        if ($dayOfMonth == 1) {
            $tanggalKemarin_reset = null; // Set tanggalKemarin ke null jika hari pertama dalam bulan
        } else {
            $tanggalKemarin_reset = Carbon::parse($tgl)->subDay()->toDateString();
        }


        $dataKemarin = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('rs_total_kemarin')
            ->first();
        $dataKemarin2 = ($dataKemarin !== null) ? $dataKemarin->rs_total_kemarin : 0;
        // dd($dataKemarin2);


        $dataKemarin_899_to_893 = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_899_893_kemarin')
            ->first();
        $dataKemarin_899_to_893 = ($dataKemarin_899_to_893 !== null) ? $dataKemarin_899_to_893->pb_899_893_kemarin : 0;

        $dataKemarin_893_to_899 = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_893_899_kemarin')
            ->first();
        $dataKemarin_893_to_899 = ($dataKemarin_893_to_899 !== null) ? $dataKemarin_893_to_899->pb_893_899_kemarin : 0;

        $dataKemarin_keluar = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_keluar_kemarin')
            ->first();
        $dataKemarin_keluar = ($dataKemarin_keluar !== null) ? $dataKemarin_keluar->ak_keluar_kemarin : 0;

        $dataKemarin_masuk = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_masuk_kemarin')
            ->first();
        $dataKemarin_masuk = ($dataKemarin_masuk !== null) ? $dataKemarin_masuk->ak_masuk_kemarin : 0;


        // Menghitung tanggal satu hari sebelumnya
        $tanggalSebelumnya = Carbon::parse($edit->created_at)->subDay()->toDateString();

        // Mengambil data dari satu hari sebelumnya
        $dataSebelumnya = Resume::whereDate('tgl_resume', $tanggalSebelumnya)->get();

        return view('pages.cash-flow.resume.create', [
            'tanggalKemarinYESR'          => $tanggalKemarinYESR,
            'edit'          => $edit,
            'dataSebelumnya'          => $dataSebelumnya,
            'dataKemarin2'   => $dataKemarin2,
            'dataKemarinPB'   => $dataKemarinPB,
            'dataKemarin_cb_petty_cash'   => $dataKemarin_cb_petty_cash,
            'dataKemarin_cb_mandiri_opr'   => $dataKemarin_cb_mandiri_opr,
            'dataKemarin_cb_mandiri_giro'   => $dataKemarin_cb_mandiri_giro,
            'dataKemarin_cb_mandiri_lsp'   => $dataKemarin_cb_mandiri_lsp,
            'dataKemarin_cb_mandiri_batam'   => $dataKemarin_cb_mandiri_batam,
            'dataKemarin_cb_mandiri_cadangan'   => $dataKemarin_cb_mandiri_cadangan,
            'data_kemarin_so_outstanding'   => $data_kemarin_so_outstanding,
            'dataKemarin_899_to_893'   => $dataKemarin_899_to_893,
            'dataKemarin_893_to_899'   => $dataKemarin_893_to_899,
            'dataKemarin_keluar'   => $dataKemarin_keluar,
            'dataKemarin_masuk'   => $dataKemarin_masuk,
            'so_outstanding_kemarin'   => $so_outstanding_kemarin,
        ]);
    }


    public function StorePreView(Request $request, $id)
    {

        // dd($request->all());
        $edit = Resume::findOrFail($id);
        $tgl = $edit->tgl_resume;
        $tanggalKemarin = Carbon::parse($tgl)->subDay()->toDateString();

        $data = $request->cb_petty_cash;
        if ($data == NULL) {
            $cb_petty_cash = NULL;
        } else {
            $cb_petty_cash = str_replace('.', '', $data);
        }

        ///  cb_petty_cash
        $get_kemarin_cb_petty_cash = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_petty_cash')
            ->first();
        $jumlah_kemarin_cb_petty_cash = ($get_kemarin_cb_petty_cash) ? $get_kemarin_cb_petty_cash->cb_petty_cash : 0;
        //ambil data kemarin

        $get_kemarin_cb_petty_cash_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_petty_cash_kemarin')
            ->first();
        $jumlah_kemarin_cb_petty_cash_kemarin = ($get_kemarin_cb_petty_cash_kemarin) ? $get_kemarin_cb_petty_cash_kemarin->cb_petty_cash_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $masuk_db_cb_petty_cash_kemarin = $jumlah_kemarin_cb_petty_cash  + $jumlah_kemarin_cb_petty_cash_kemarin;

        $data2 = $request->cb_mandiri_opr;
        if ($data == NULL) {
            $cb_mandiri_opr = NULL;
        } else {
            $cb_mandiri_opr = str_replace('.', '', $data2);
        }
        ///  cb_mandiri_opr
        $get_kemarin_cb_mandiri_opr = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_opr')
            ->first();
        $jumlah_kemarin_cb_mandiri_opr = ($get_kemarin_cb_mandiri_opr) ? $get_kemarin_cb_mandiri_opr->cb_mandiri_opr : 0;
        $get_kemarin_cb_mandiri_opr_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_opr_kemarin')
            ->first();
        $jumlah_kemarin_cb_mandiri_opr_kemarin = ($get_kemarin_cb_mandiri_opr_kemarin) ? $get_kemarin_cb_mandiri_opr_kemarin->cb_mandiri_opr_kemarin : 0;
        $masuk_db_cb_mandiri_opr_kemarin = $jumlah_kemarin_cb_mandiri_opr  + $jumlah_kemarin_cb_mandiri_opr_kemarin;



        $data3 = $request->cb_mandiri_giro;
        if ($data3 == NULL) {
            $cb_mandiri_giro = NULL;
        } else {
            $cb_mandiri_giro = str_replace('.', '', $data3);
        }
        /// cb_mandiri_giro
        $get_kemarin_cb_mandiri_giro = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_giro')
            ->first();
        $jumlah_kemarin_cb_mandiri_giro = ($get_kemarin_cb_mandiri_giro) ? $get_kemarin_cb_mandiri_giro->cb_mandiri_giro : 0;
        $get_kemarin_cb_mandiri_giro_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_giro_kemarin')
            ->first();
        $jumlah_kemarin_cb_mandiri_giro_kemarin = ($get_kemarin_cb_mandiri_giro_kemarin) ? $get_kemarin_cb_mandiri_giro_kemarin->cb_mandiri_giro_kemarin : 0;
        $masuk_db_cb_mandiri_giro_kemarin = $jumlah_kemarin_cb_mandiri_giro + $jumlah_kemarin_cb_mandiri_giro_kemarin;


        $data4 = $request->cb_mandiri_lsp;
        if ($data4 == NULL) {
            $cb_mandiri_lsp = NULL;
        } else {
            $cb_mandiri_lsp = str_replace('.', '', $data4);
        }
        /// cb_mandiri_lsp
        $get_kemarin_cb_mandiri_lsp = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_lsp')
            ->first();
        $jumlah_kemarin_cb_mandiri_lsp = ($get_kemarin_cb_mandiri_lsp) ? $get_kemarin_cb_mandiri_lsp->cb_mandiri_lsp : 0;
        $get_kemarin_cb_mandiri_lsp_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_lsp_kemarin')
            ->first();
        $jumlah_kemarin_cb_mandiri_lsp_kemarin = ($get_kemarin_cb_mandiri_lsp_kemarin) ? $get_kemarin_cb_mandiri_lsp_kemarin->cb_mandiri_lsp_kemarin : 0;
        $masuk_db_cb_mandiri_lsp_kemarin = $jumlah_kemarin_cb_mandiri_lsp + $jumlah_kemarin_cb_mandiri_lsp_kemarin;


        $data5 = $request->cb_mandiri_batam;
        if ($data5 == NULL) {
            $cb_mandiri_batam = NULL;
        } else {
            $cb_mandiri_batam = str_replace('.', '', $data5);
        }

        /// cb_mandiri_batam
        $get_kemarin_cb_mandiri_batam = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_batam')
            ->first();
        $jumlah_kemarin_cb_mandiri_batam = ($get_kemarin_cb_mandiri_batam) ? $get_kemarin_cb_mandiri_batam->cb_mandiri_batam : 0;
        $get_kemarin_cb_mandiri_batam_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_batam_kemarin')
            ->first();
        $jumlah_kemarin_cb_mandiri_batam_kemarin = ($get_kemarin_cb_mandiri_batam_kemarin) ? $get_kemarin_cb_mandiri_batam_kemarin->cb_mandiri_batam_kemarin : 0;
        $masuk_db_cb_mandiri_batam_kemarin = $jumlah_kemarin_cb_mandiri_batam + $jumlah_kemarin_cb_mandiri_batam_kemarin;


        $data6 = $request->cb_mandiri_cadangan;
        if ($data6 == NULL) {
            $cb_mandiri_cadangan = NULL;
        } else {
            $cb_mandiri_cadangan = str_replace('.', '', $data6);
        }
        /// cb_mandiri_cadangan
        $get_kemarin_cb_mandiri_cadangan = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_cadangan')
            ->first();
        $jumlah_kemarin_cb_mandiri_cadangan = ($get_kemarin_cb_mandiri_cadangan) ? $get_kemarin_cb_mandiri_cadangan->cb_mandiri_cadangan : 0;
        $get_kemarin_cb_mandiri_cadangan_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('cb_mandiri_cadangan_kemarin')
            ->first();
        $jumlah_kemarin_cb_mandiri_cadangan_kemarin = ($get_kemarin_cb_mandiri_cadangan_kemarin) ? $get_kemarin_cb_mandiri_cadangan_kemarin->cb_mandiri_cadangan_kemarin : 0;
        $masuk_db_cb_mandiri_cadangan_kemarin = $jumlah_kemarin_cb_mandiri_cadangan + $jumlah_kemarin_cb_mandiri_cadangan_kemarin;

        // get so_outstanding_kemarin kemarin
        $so_outstanding_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('so_outstanding_total')
            ->first();
        $so_outstanding_kemarin = ($so_outstanding_kemarin !== null) ?
            $so_outstanding_kemarin->so_outstanding_total : 0;

        // dd($so_outstanding_kemarin);

        $data13 = $request->so_adjusment_invoice;
        if ($data13 == NULL) {
            $so_adjusment_invoice = NULL;
        } else {
            $so_adjusment_invoice = str_replace('.', '', $data13);
        }


        $data14 = $request->so_invoice_out;
        if ($data14 == NULL) {
            $so_invoice_out = NULL;
        } else {
            $so_invoice_out = str_replace('.', '', $data14);
        }

        $data15 = $request->so_prepaid_tax;
        if ($data15 == NULL) {
            $so_prepaid_tax = NULL;
        } else {
            $so_prepaid_tax = str_replace('.', '', $data15);
        }

        $data16 = $request->so_paid_today;
        if ($data16 == NULL) {
            $so_paid_today = NULL;
        } else {
            $so_paid_today = str_replace('.', '', $data16);
        }

        $dataKemarin_total_so = $so_outstanding_kemarin - $so_adjusment_invoice + $so_invoice_out - $so_prepaid_tax - $so_paid_today;
        // dd($dataKemarin_total_so);


        // Mendapatkan hari dari tanggal
        $dayOfMonth = Carbon::parse($tgl)->day;
        // Mendapatkan tanggal kemarin
        if ($dayOfMonth == 1) {
            $tanggalKemarin_reset = null; // Set tanggalKemarin ke null jika hari pertama dalam bulan
        } else {
            $tanggalKemarin_reset = Carbon::parse($tgl)->subDay()->toDateString();
        }

        // Overbooking / Pindah Buku
        //get request pb
        $data10 = $request->pb_899_893;
        if ($data10 == NULL) {
            $pb_899_893 = NULL;
        } else {
            $pb_899_893 = str_replace('.', '', $data10);
        }

        $data11 = $request->pb_893_899;
        if ($data11 == NULL) {
            $pb_893_899 = NULL;
        } else {
            $pb_893_899 = str_replace('.', '', $data11);
        }


        ///  pb_899_893
        $get_kemarin_pb_899_893 = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_899_893')
            ->first();
        $jumlah_kemarin_pb_899_893 = ($get_kemarin_pb_899_893) ? $get_kemarin_pb_899_893->pb_899_893 : 0;
        //ambil data kemarin

        $get_kemarin_pb_899_893_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_899_893_kemarin')
            ->first();
        $jumlah_kemarin_pb_899_893_kemarin = ($get_kemarin_pb_899_893_kemarin) ? $get_kemarin_pb_899_893_kemarin->pb_899_893_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $data_kemarin_pb_899_893 = $jumlah_kemarin_pb_899_893  + $jumlah_kemarin_pb_899_893_kemarin;


        ///  pb_893_899
        $get_kemarin_pb_893_899 = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_893_899')
            ->first();
        $jumlah_kemarin_pb_893_899 = ($get_kemarin_pb_893_899) ? $get_kemarin_pb_893_899->pb_893_899 : 0;
        //ambil data kemarin

        $get_kemarin_pb_893_899_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('pb_893_899_kemarin')
            ->first();
        $jumlah_kemarin_pb_893_899_kemarin = ($get_kemarin_pb_893_899_kemarin) ? $get_kemarin_pb_893_899_kemarin->pb_893_899_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $data_kemarin_pb_893_899 = $jumlah_kemarin_pb_893_899  + $jumlah_kemarin_pb_893_899_kemarin;

        $pb_total_today  = $pb_893_899 + $pb_899_893;
        $pb_total_kemarin = $data_kemarin_pb_899_893 + $data_kemarin_pb_893_899;
        $pb_total = $pb_total_today + $pb_total_kemarin;

        $pb_total_899_893 = $pb_899_893 + $data_kemarin_pb_899_893;
        $pb_total_893_899 = $pb_893_899 + $data_kemarin_pb_893_899;


        $data7 = $request->rs_total_today;
        if ($data7 == NULL) {
            $rs_total_today = NULL;
        } else {
            $rs_total_today = str_replace('.', '', $data7);
        }

        $data8 = $request->ak_masuk;
        if ($data8 == NULL) {
            $ak_masuk = NULL;
        } else {
            $ak_masuk = str_replace('.', '', $data8);
        }


        $data9 = $request->ak_keluar;
        if ($data9 == NULL) {
            $ak_keluar = NULL;
        } else {
            $ak_keluar = str_replace('.', '', $data9);
        }


        $cb_total_today = $cb_petty_cash + $cb_mandiri_opr + $cb_mandiri_giro + $cb_mandiri_lsp + $cb_mandiri_batam + $cb_mandiri_cadangan;
        $cb_total_kemarin = $masuk_db_cb_petty_cash_kemarin + $masuk_db_cb_mandiri_opr_kemarin + $masuk_db_cb_mandiri_giro_kemarin + $masuk_db_cb_mandiri_lsp_kemarin + $masuk_db_cb_mandiri_batam_kemarin + $masuk_db_cb_mandiri_cadangan_kemarin;
        $cb_total =   $cb_total_today  + $cb_total_kemarin;


        //revenue san sales
        ///  cb_petty_cash
        $get_kemarin_rs_total_today = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('rs_total_today')
            ->first();
        $jumlah_kemarin_rs_total_today = ($get_kemarin_rs_total_today) ? $get_kemarin_rs_total_today->rs_total_today : 0;
        //ambil data kemarin

        $get_kemarin_rs_total_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin)
            ->orderBy('tgl_resume', 'desc')
            ->select('rs_total_kemarin')
            ->first();
        $jumlah_kemarin_rs_total_kemarin = ($get_kemarin_rs_total_kemarin) ? $get_kemarin_rs_total_kemarin->rs_total_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $dataKemarin2 = $jumlah_kemarin_rs_total_today  + $jumlah_kemarin_rs_total_kemarin;

        $rs_total = $dataKemarin2 + $rs_total_today;

        //Arus Kas
        $dataKemarinAK = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_total')
            ->first();


        ///  ak_masuky_cash
        $get_kemarin_ak_masuk = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_masuk')
            ->first();
        $jumlah_kemarin_ak_masuk = ($get_kemarin_ak_masuk) ? $get_kemarin_ak_masuk->ak_masuk : 0;
        //ambil data kemarin

        $get_kemarin_ak_masuk_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_masuk_kemarin')
            ->first();
        $jumlah_kemarin_ak_masuk_kemarin = ($get_kemarin_ak_masuk_kemarin) ? $get_kemarin_ak_masuk_kemarin->ak_masuk_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $data_kemarin_ak_masuk = $jumlah_kemarin_ak_masuk  + $jumlah_kemarin_ak_masuk_kemarin;

        ///  ak_masuky_cash
        $get_kemarin_ak_keluar = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_keluar')
            ->first();
        $jumlah_kemarin_ak_keluar = ($get_kemarin_ak_keluar) ? $get_kemarin_ak_keluar->ak_keluar : 0;
        //ambil data kemarin

        $get_kemarin_ak_keluar_kemarin = Resume::whereDate('tgl_resume', $tanggalKemarin_reset)
            ->orderBy('tgl_resume', 'desc')
            ->select('ak_keluar_kemarin')
            ->first();
        $jumlah_kemarin_ak_keluar_kemarin = ($get_kemarin_ak_keluar_kemarin) ? $get_kemarin_ak_keluar_kemarin->ak_keluar_kemarin : 0;

        //jumlahkan cb_petty_cash yesterdey + cb_petty_cash_kemarin yesterday =; dan hasil nya masukkan ke dalam tabel cb_petty_cash_kemarin  by request ini;
        $data_kemarin_ak_keluar = $jumlah_kemarin_ak_keluar  + $jumlah_kemarin_ak_keluar_kemarin;

        $total_data_kemarin =  $data_kemarin_ak_masuk + $data_kemarin_ak_keluar;
        $dataKemarin2AK = ($dataKemarinAK !== null) ? $dataKemarinAK->ak_total : 0;
        $ak_total_today = $ak_masuk + $ak_keluar;
        $ak_total = $ak_total_today + $dataKemarin2AK;

        $ak_total_keluar = $data_kemarin_ak_keluar + $ak_keluar;
        $ak_total_masuk = $data_kemarin_ak_masuk + $ak_masuk;

        $data20 = $request->rasio_total_revenue;
        if ($data20 == NULL) {
            $rasio_total_revenue = NULL;
        } else {
            $rasio_total_revenue = str_replace('.', '', $data20);
        }

        $data21 = $request->rasio_account_payable;
        if ($data21 == NULL) {
            $rasio_account_payable = NULL;
        } else {
            $rasio_account_payable = str_replace('.', '', $data21);
        }

        $resume_cash_bank = $cb_total_kemarin + $cb_total_today;

        $ovb_899_893 = $data_kemarin_pb_899_893 + $pb_899_893;
        $ovb_893_899 = $data_kemarin_pb_893_899 + $pb_893_899;
        $ovb_total = $ovb_899_893 + $ovb_893_899;

        $total_ex_keluar = $data_kemarin_ak_keluar + $ak_keluar;
        $total_revenue_sales =   $dataKemarin2 + $rs_total_today;


        $ak_masuk_kemarin_dan_hari_ini = $data_kemarin_ak_masuk + $ak_masuk;
        $ak_keluar_kemarin_dan_hari_ini = $data_kemarin_ak_keluar + $ak_keluar;
        $total_profit_loss  = $ak_masuk_kemarin_dan_hari_ini - $ak_keluar_kemarin_dan_hari_ini;

        $rasio_total = $resume_cash_bank + $dataKemarin_total_so;
        $rasio_rasio =  $rasio_total + $rasio_total_revenue + $rasio_account_payable;

        $rasio_until_6_month = $rasio_rasio / 6;
        $rasio_rata_rata_expense = $rasio_rasio / 750000000;

        $edit->update([
            'tgl_resume' => $request->tgl_resume,
            'cb_petty_cash' => $cb_petty_cash,
            'cb_petty_cash_kemarin' => $masuk_db_cb_petty_cash_kemarin,
            'cb_mandiri_opr' => $cb_mandiri_opr,
            'cb_mandiri_opr_kemarin' => $masuk_db_cb_mandiri_opr_kemarin,
            'cb_mandiri_giro' => $cb_mandiri_giro,
            'cb_mandiri_giro_kemarin' => $masuk_db_cb_mandiri_giro_kemarin,
            'cb_mandiri_lsp' => $cb_mandiri_lsp,
            'cb_mandiri_lsp_kemarin' => $masuk_db_cb_mandiri_lsp_kemarin,
            'cb_mandiri_batam' => $cb_mandiri_batam,
            'cb_mandiri_batam_kemarin' => $masuk_db_cb_mandiri_batam_kemarin,
            'cb_mandiri_cadangan' => $cb_mandiri_cadangan,
            'cb_mandiri_cadangan_kemarin' => $masuk_db_cb_mandiri_cadangan_kemarin,
            'cb_total_today' => $cb_total_today,
            'cb_total_kemarin' => $cb_total_kemarin,
            'cb_total' => $cb_total,
            'rs_total_today' => $rs_total_today,
            'rs_total_kemarin' => $dataKemarin2,
            'rs_total' => $rs_total,
            'ak_masuk' => $ak_masuk,
            'ak_masuk_kemarin' => $data_kemarin_ak_masuk,
            'ak_keluar' => $ak_keluar,
            'ak_keluar_kemarin' => $data_kemarin_ak_keluar,
            'ak_total_today' => $ak_total_today,
            'ak_total_kemarin' => $total_data_kemarin,
            'ak_total_keluar' => $ak_total_keluar,
            'ak_total_masuk' => $ak_total_masuk,
            'ak_total' => $ak_total,
            'pb_899_893'  => $pb_899_893,
            'pb_899_893_kemarin'  => $data_kemarin_pb_899_893,
            'pb_893_899'  => $pb_893_899,
            'pb_893_899_kemarin'  => $data_kemarin_pb_893_899,
            'pb_total_today'  => $pb_total_today,
            'pb_total_kemarin'  => $pb_total_kemarin,
            'pb_total'  => $pb_total,
            'pb_total_899_893'  => $pb_total_899_893,
            'pb_total_893_899'  => $pb_total_893_899,
            'so_adjusment_invoice'  => $so_adjusment_invoice,
            'so_invoice_out'  => $so_invoice_out,
            'so_prepaid_tax'  => $so_prepaid_tax,
            'so_paid_today'  => $so_paid_today,
            'so_outstanding_kemarin'  => $so_outstanding_kemarin,
            'so_outstanding_total'  => $dataKemarin_total_so,
            'resume_cash_bank'  => $resume_cash_bank,
            'resume_ovb_899_893'  => $ovb_899_893,
            'resume_ovb_893_899'  => $ovb_893_899,
            'resume_total_ovb'  => $ovb_total,
            'resume_expanses'  => $total_ex_keluar,
            'resume_outstanding'  => $dataKemarin_total_so,
            'resume_profit_los'  => $total_profit_loss,
            'resume_revenue_sales'  => $total_revenue_sales,
            'rasio_cash_bank'  => $resume_cash_bank,
            'rasio_outstanding'  => $dataKemarin_total_so,
            'rasio_total'  => $rasio_total,
            'rasio_total_revenue'  => $rasio_total_revenue,
            'rasio_account_payable'  => $rasio_account_payable,
            'rasio_rasio'  => $rasio_rasio,
            'rasio_until_6_month'  => $rasio_until_6_month,
            'rasio_rata_rata_expense'  => $rasio_rata_rata_expense,
            'status'  => 1
        ]);
        return redirect()->route('resume.index')->with(
            'success',
            'Success ! Data  Berhasil di Tambahkan'
        );
    }

    public function printPdf($id)
    {
        $data = Resume::find($id);

        $totalCbTotal = Resume::sum('cb_total');

        // dd($data);
        $pdf = PDF::loadview('pages.cash-flow.resume.pdf', [
            'data'  => $data,
            'totalCbTotal'  => $totalCbTotal,

        ]);
        $pdf->set_paper('a4', 'potrait');
        return $pdf->stream('Daily Cash Flow Report.pdf');
    }
}

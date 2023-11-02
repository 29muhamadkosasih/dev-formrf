<?php

namespace App\Http\Controllers;

use App\Models\Os;
use App\Models\InvPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvPaymentResumeController extends Controller
{
    public function index()
    {
        // dd('ding');
        $currentDay = date('d');

        $invpayment = InvPayment::orderBy('created_at', 'asc')->get();
        $jumlah_a = InvPayment::sum('amount_invoice');
        $jumlah_b = InvPayment::sum('payment_in');
        $jumlah_c = InvPayment::sum('deduction');
        $latestData = Os::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->take(1)
            ->get();

        $currentMonth = date('m');
        $currentYears = date('Y');
        // dd($currentYears)
        $total_inv = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->get()
            ->count();

        $amount_inv = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->get()
            ->sum('amount_invoice');

        $penerimaan = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->get()
            ->sum('payment_in');

        $pph = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->get()
            ->sum('deduction');

        $os1 =  $penerimaan + $pph;
        // dd($os1);

        $os = $amount_inv - $os1;

        $jan = 1;
        $feb = 2;
        $mar = 3;
        $apr = 4;
        $mi = 5;
        $jun = 6;
        $jul = 7;
        $ag = 8;
        $sep = 9;
        $ok = 10;
        $nov = 11;
        $des = 12;
        // dd($mei);

        $januari = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->count();

        $januariCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('amount_invoice');
        $januariTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('payment_in');
        $januariDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('deduction');


        $os1 =  $januariTot + $januariDeduc;
        // dd($os1);

        $JanOS = $januariCount - $os1;


        $februari = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->count();

        $februariCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('amount_invoice');
        $februariTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('payment_in');
        $februariDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('deduction');


        $os2 =  $februariTot + $februariDeduc;
        // dd($os1);

        $FebOS = $februariCount - $os2;


        $maret = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->count();

        $maretCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('amount_invoice');
        $maretTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('payment_in');
        $maretDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('deduction');


        $os3 = $maretTot + $maretDeduc;
        // dd($os1);

        $MarOS = $maretCount - $os3;


        $april = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->count();

        $aprilCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('amount_invoice');
        $aprilTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('payment_in');
        $aprilDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('deduction');


        $os4 = $aprilTot + $aprilDeduc;
        // dd($os1);

        $aprOS = $aprilCount - $os4;


        $mei = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->count();

        $meiCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('amount_invoice');
        $meiTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('payment_in');
        $meiDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('deduction');


        $os5 = $meiTot + $meiDeduc;
        // dd($os1);

        $meiOS = $meiCount - $os5;



        $juni = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->count();

        $juniCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('amount_invoice');
        $juniTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('payment_in');
        $juniDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('deduction');


        $os6 = $juniTot + $juniDeduc;
        // dd($os1);

        $juniOS = $juniCount - $os6;


        $juli = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->count();
        $juliCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('amount_invoice');
        $juliTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('payment_in');
        $juliDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('deduction');


        $os7 = $juliTot + $juliDeduc;
        // dd($os1);

        $juliOS = $juliCount - $os7;


        $agustus = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->count();

        $agustusCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('amount_invoice');
        $agustusTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('payment_in');
        $agustusDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('deduction');


        $os8 = $agustusTot + $agustusDeduc;
        // dd($os1);

        $agustusOS = $agustusCount - $os8;

        $september = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->count();

        $septemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('amount_invoice');
        $septemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('payment_in');
        $septemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('deduction');


        $os9 = $septemberTot + $septemberDeduc;
        // dd($os1);

        $septemberOS = $septemberCount - $os9;


        $oktober = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->count();

        $oktoberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('amount_invoice');
        $oktoberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('payment_in');
        $oktoberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('deduction');


        $os10 = $oktoberTot + $oktoberDeduc;
        // dd($os1);

        $oktoberOS = $oktoberCount - $os10;



        $november = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->count();
        $novemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('amount_invoice');
        $novemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('payment_in');
        $novemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('deduction');


        $os11 = $novemberTot + $novemberDeduc;
        // dd($os1);

        $novemberOS = $novemberCount - $os11;


        $desember = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $des
            )
            ->get()
            ->count();

        $desemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('amount_invoice');
        $desemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('payment_in');
        $desemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('deduction');


        $os12 = $desemberTot + $desemberDeduc;
        // dd($os1);

        $desemberOS = $desemberCount - $os12;



        return view('pages.invpayment.resume.index', [
            'invpayment'  => $invpayment,
            'jumlah_a'  => $jumlah_a,
            'jumlah_b'  => $jumlah_b,
            'jumlah_c'  => $jumlah_c,
            'latestData'  => $latestData,
            'total_inv'  => $total_inv,
            'amount_inv'  => $amount_inv,
            'penerimaan'  => $penerimaan,
            'pph'  => $pph,
            'os'  => $os,
            'januari'  => $januari,
            'januariCount'  => $januariCount,
            'januariTot'  => $januariTot,
            'januariDeduc'  => $januariDeduc,
            'JanOS'  => $JanOS,
            'februari'  => $februari,
            'februariCount'  => $februariCount,
            'februariTot'  => $februariTot,
            'februariDeduc'  => $februariDeduc,
            'FebOS'  => $FebOS,
            'maret'  => $maret,
            'maretCount' => $maretCount,
            'maretTot' => $maretTot,
            'maretDeduc' => $maretDeduc,
            'MarOS' => $MarOS,
            'april'  => $april,
            'aprilCount' => $aprilCount,
            'aprilTot' => $aprilTot,
            'aprilDeduc' => $aprilDeduc,
            'aprOS' => $aprOS,
            'mei'  => $mei,
            'meiCount' => $meiCount,
            'meiTot' => $meiTot,
            'meiDeduc' => $meiDeduc,
            'meiOS' => $meiOS,
            'juni'  => $juni,
            'juniCount' => $juniCount,
            'juniTot' => $juniTot,
            'juniDeduc' => $juniDeduc,
            'juniOS' => $juniOS,
            'juli'  => $juli,
            'juliCount' => $juliCount,
            'juliTot' => $juliTot,
            'juliDeduc' => $juliDeduc,
            'juliOS' => $juliOS,
            'agustus'  => $agustus,
            'agustusCount' => $agustusCount,
            'agustusTot' => $agustusTot,
            'agustusDeduc' => $agustusDeduc,
            'agustusOS' => $agustusOS,
            'september'  => $september,
            'septemberCount' => $septemberCount,
            'septemberTot' => $septemberTot,
            'septemberDeduc' => $septemberDeduc,
            'septemberOS' => $septemberOS,
            'oktober'  => $oktober,
            'oktoberCount' => $oktoberCount,
            'oktoberTot' => $oktoberTot,
            'oktoberDeduc' => $oktoberDeduc,
            'oktoberOS' => $oktoberOS,
            'november'  => $november,
            'novemberCount' => $novemberCount,
            'novemberTot' => $novemberTot,
            'novemberDeduc' => $novemberDeduc,
            'novemberOS' => $novemberOS,
            'desember'  => $desember,
            'desemberCount' => $desemberCount,
            'desemberTot' => $desemberTot,
            'desemberDeduc' => $desemberDeduc,
            'desemberOS' => $desemberOS,
            'currentYears'  => $currentYears,
        ]);
    }

    public function getYears(Request $request)
    {
        // dd($request);
        $from = $request->from . ' ';

        // dd($from);

        $currentDay = date('d');

        $invpayment = InvPayment::orderBy('created_at', 'asc')->get();
        $jumlah_a = InvPayment::sum('amount_invoice');
        $jumlah_b = InvPayment::sum('payment_in');
        $jumlah_c = InvPayment::sum('deduction');
        $latestData = Os::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->take(1)
            ->get();

        $currentMonth = date('m');
        // $from = date('Y');
        // dd($from)
        $total_inv = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->get()
            ->count();
        // dd($total_inv);

        $amount_inv = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->get()
            ->sum('amount_invoice');

        $penerimaan = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->get()
            ->sum('payment_in');

        $pph = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->get()
            ->sum('deduction');

        $os1 = $penerimaan + $pph;
        // dd($os1);

        $os = $amount_inv - $os1;

        $jan = 1;
        $feb = 2;
        $mar = 3;
        $apr = 4;
        $mi = 5;
        $jun = 6;
        $jul = 7;
        $ag = 8;
        $sep = 9;
        $ok = 10;
        $nov = 11;
        $des = 12;
        // dd($mei);

        $januari = DB::table('invpayment')
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->whereYear('date_invoice', $from)
            ->get()
            ->count();

        $januariCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('amount_invoice');
        $januariTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('payment_in');
        $januariDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jan
            )
            ->get()
            ->sum('deduction');


        $os1 = $januariTot + $januariDeduc;
        // dd($os1);

        $JanOS = $januariCount - $os1;


        $februari = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->count();

        $februariCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('amount_invoice');
        $februariTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('payment_in');
        $februariDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $feb
            )
            ->get()
            ->sum('deduction');


        $os2 = $februariTot + $februariDeduc;
        // dd($os1);

        $FebOS = $februariCount - $os2;


        $maret = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->count();

        $maretCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('amount_invoice');
        $maretTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('payment_in');
        $maretDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->sum('deduction');


        $os3 = $maretTot + $maretDeduc;
        // dd($os1);

        $MarOS = $maretCount - $os3;


        $april = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->count();

        $aprilCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('amount_invoice');
        $aprilTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('payment_in');
        $aprilDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->sum('deduction');


        $os4 = $aprilTot + $aprilDeduc;
        // dd($os1);

        $aprOS = $aprilCount - $os4;


        $mei = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->count();

        $meiCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('amount_invoice');
        $meiTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('payment_in');
        $meiDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $mi
            )
            ->get()
            ->sum('deduction');


        $os5 = $meiTot + $meiDeduc;
        // dd($os1);

        $meiOS = $meiCount - $os5;



        $juni = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->count();

        $juniCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('amount_invoice');
        $juniTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('payment_in');
        $juniDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->sum('deduction');


        $os6 = $juniTot + $juniDeduc;
        // dd($os1);

        $juniOS = $juniCount - $os6;


        $juli = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->count();
        $juliCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('amount_invoice');
        $juliTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('payment_in');
        $juliDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->sum('deduction');


        $os7 = $juliTot + $juliDeduc;
        // dd($os1);

        $juliOS = $juliCount - $os7;


        $agustus = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->count();

        $agustusCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('amount_invoice');
        $agustusTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('payment_in');
        $agustusDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->sum('deduction');


        $os8 = $agustusTot + $agustusDeduc;
        // dd($os1);

        $agustusOS = $agustusCount - $os8;

        $september = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->count();

        $septemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('amount_invoice');
        $septemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('payment_in');
        $septemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->sum('deduction');


        $os9 = $septemberTot + $septemberDeduc;
        // dd($os1);

        $septemberOS = $septemberCount - $os9;


        $oktober = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->count();

        $oktoberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('amount_invoice');
        $oktoberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('payment_in');
        $oktoberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->sum('deduction');


        $os10 = $oktoberTot + $oktoberDeduc;
        // dd($os1);

        $oktoberOS = $oktoberCount - $os10;



        $november = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->count();
        $novemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('amount_invoice');
        $novemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('payment_in');
        $novemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('deduction');


        $os11 = $novemberTot + $novemberDeduc;
        // dd($os1);

        $novemberOS = $novemberCount - $os11;


        $desember = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $des
            )
            ->get()
            ->count();

        $desemberCount = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('amount_invoice');
        $desemberTot = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('payment_in');
        $desemberDeduc = DB::table('invpayment')
            ->whereYear('date_invoice', $from)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->sum('deduction');


        $os12 = $desemberTot + $desemberDeduc;
        // dd($os1);

        $desemberOS = $desemberCount - $os12;



        return view('pages.invpayment.resume.GetYear', [
            'invpayment' => $invpayment,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'jumlah_c' => $jumlah_c,
            'latestData' => $latestData,
            'total_inv' => $total_inv,
            'amount_inv' => $amount_inv,
            'penerimaan' => $penerimaan,
            'pph' => $pph,
            'os' => $os,
            'januari' => $januari,
            'januariCount' => $januariCount,
            'januariTot' => $januariTot,
            'januariDeduc' => $januariDeduc,
            'JanOS' => $JanOS,
            'februari' => $februari,
            'februariCount' => $februariCount,
            'februariTot' => $februariTot,
            'februariDeduc' => $februariDeduc,
            'FebOS' => $FebOS,
            'maret' => $maret,
            'maretCount' => $maretCount,
            'maretTot' => $maretTot,
            'maretDeduc' => $maretDeduc,
            'MarOS' => $MarOS,
            'april' => $april,
            'aprilCount' => $aprilCount,
            'aprilTot' => $aprilTot,
            'aprilDeduc' => $aprilDeduc,
            'aprOS' => $aprOS,
            'mei' => $mei,
            'meiCount' => $meiCount,
            'meiTot' => $meiTot,
            'meiDeduc' => $meiDeduc,
            'meiOS' => $meiOS,
            'juni' => $juni,
            'juniCount' => $juniCount,
            'juniTot' => $juniTot,
            'juniDeduc' => $juniDeduc,
            'juniOS' => $juniOS,
            'juli' => $juli,
            'juliCount' => $juliCount,
            'juliTot' => $juliTot,
            'juliDeduc' => $juliDeduc,
            'juliOS' => $juliOS,
            'agustus' => $agustus,
            'agustusCount' => $agustusCount,
            'agustusTot' => $agustusTot,
            'agustusDeduc' => $agustusDeduc,
            'agustusOS' => $agustusOS,
            'september' => $september,
            'septemberCount' => $septemberCount,
            'septemberTot' => $septemberTot,
            'septemberDeduc' => $septemberDeduc,
            'septemberOS' => $septemberOS,
            'oktober' => $oktober,
            'oktoberCount' => $oktoberCount,
            'oktoberTot' => $oktoberTot,
            'oktoberDeduc' => $oktoberDeduc,
            'oktoberOS' => $oktoberOS,
            'november' => $november,
            'novemberCount' => $novemberCount,
            'novemberTot' => $novemberTot,
            'novemberDeduc' => $novemberDeduc,
            'novemberOS' => $novemberOS,
            'desember' => $desember,
            'desemberCount' => $desemberCount,
            'desemberTot' => $desemberTot,
            'desemberDeduc' => $desemberDeduc,
            'desemberOS' => $desemberOS,
            'from' => $from,
        ]);
    }
}
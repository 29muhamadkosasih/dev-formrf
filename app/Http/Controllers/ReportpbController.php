<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\Saldo;
use App\Models\Reportpb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportpbController extends Controller
{
    public function store(Request $request)
    {
        $amount2 = $request->a_b;
        if ($amount2 == NULL) {
            $amountWithoutDots2 = NULL;
        } else {
            $amountWithoutDots2 = str_replace('.', '', $amount2);
        }

        $amount3 = $request->b_a;
        if ($amount3 == NULL) {
            $amountWithoutDots3 = NULL;
        } else {
            $amountWithoutDots3 = str_replace('.', '', $amount3);
        }


        $amount4 = $request->p_uang_kas;
        if ($amount4 == NULL) {
            $amountWithoutDots4 = NULL;
        } else {
            $amountWithoutDots4 = str_replace('.', '', $amount4);
        }

        Reportpb::create([
            'a_b' => $amountWithoutDots2,
            'b_a' => $amountWithoutDots3,
            'p_uang_kas' => $amountWithoutDots4,
        ]);
        return back()
            ->with('success', 'Congratulation ! Pemindahan Buku Berhasil');
    }

    public function index()
    {
        $currentDay = date('d');
        $form = Form::where('status', '4')
            ->where('payment', 'Cash')
            ->whereDay('created_at', $currentDay)
            ->get();
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total = DB::table('form')
            ->where('status', '4')
            ->whereDay('created_at', $currentDay)
            ->where('payment', 'Cash')
            ->sum('jumlah_total');

        $form2 = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('created_at', $currentDay)
            ->get();
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total2 = DB::table('form')
            ->whereDay('created_at', $currentDay)
            ->where('status', '4')
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_total3 = DB::table('form')
            ->where('status', '4')
            ->whereDay('created_at', $currentDay)->sum('jumlah_total');

        $jumlah_saldo = Reportpb::whereDay('created_at', $currentDay)->sum('jumlah_saldo');

        $latestData = Saldo::orderBy('created_at', 'desc')->take(1)->get();
        // dd($request);

        return view('pages.form.selesai.todaysaldo', [
            'form' => $form,
            'jumlah_total' => $jumlah_total,
            'currentDate' => $currentDate,
            'form2' => $form2,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total3' => $jumlah_total3,
            'jumlah_saldo' => $jumlah_saldo,
            'latestData' => $latestData,

        ]);
    }

    public function saldoStore(Request $request)
    {

        $amount2 = $request->jumlah_saldo_899;
        if ($amount2 == NULL) {
            $amountWithoutDots2 = NULL;
        } else {
            $amountWithoutDots2 = str_replace('.', '', $amount2);
        }

        $amount3 = $request->p_cash;
        if ($amount3 == NULL) {
            $amountWithoutDots3 = NULL;
        } else {
            $amountWithoutDots3 = str_replace('.', '', $amount3);
        }

        $amount4 = $request->jumlah_saldo_893;
        if ($amount4 == NULL) {
            $amountWithoutDots4 = NULL;
        } else {
            $amountWithoutDots4 = str_replace('.', '', $amount4);
        }
        Saldo::create([
            'jumlah_saldo_899'   => $amountWithoutDots2,
            'p_cash'   => $amountWithoutDots3,
            'jumlah_saldo_893'   => $amountWithoutDots4,
        ]);

        return redirect()->route('today')->with('success', 'Congratulation ! Saldo Berhasil Tambahkan');
    }

    public function showPrintView()
    {
        $currentDay = date('d');
        $form = Form::where('status', '4')
            ->where('payment', 'Cash')
            ->whereDay('created_at', $currentDay)
            ->get();
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total = DB::table('form')
            ->where('status', '4')
            ->whereDay('created_at', $currentDay)
            ->where('payment', 'Cash')
            ->sum('jumlah_total');

        $form2 = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('created_at', $currentDay)
            ->get();
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total2 = DB::table('form')
            ->whereDay('created_at', $currentDay)
            ->where('status', '4')
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_total3 = DB::table('form')
            ->where('status', '4')
            ->whereDay('created_at', $currentDay)->sum('jumlah_total');

        $jumlah_saldo = Reportpb::whereDay('created_at', $currentDay)->sum('jumlah_saldo');

        $latestData = Saldo::orderBy('created_at', 'desc')->take(1)->get();
        // dd($request);

        return view('pages.form.selesai.todaysaldo', [
            'form' => $form,
            'jumlah_total' => $jumlah_total,
            'currentDate' => $currentDate,
            'form2' => $form2,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total3' => $jumlah_total3,
            'jumlah_saldo' => $jumlah_saldo,
            'latestData' => $latestData,

        ]);
    }

    public function getLaporan(Request $request)
    {
        // dd($request);
        $from = $request->from . ' ';
        $to = $request->to . ' ';
        // dd($to);
        $data = Reportpb::whereBetween('created_at', [$from, $to])
            ->get();

        $jumlah_a = DB::table('reportpb')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('a_b');
        $jumlah_b = DB::table('reportpb')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('b_a');

        $p_uang_kas = DB::table('reportpb')
            ->whereBetween('created_at', [$from, $to])
            ->sum('p_uang_kas');
        return view('pages.reportPB.getlaporan', [
            'data' => $data,
            'from' => $from,
            'to' => $to,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'p_uang_kas' => $p_uang_kas,
        ]);
    }
}

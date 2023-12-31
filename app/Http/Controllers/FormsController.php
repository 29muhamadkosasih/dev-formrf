<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Saldo;
use App\Models\Reportpb;
use App\Models\Tpengajuan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\FormPaidExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class FormsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form-list.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $form = Form::where('status', '>', '3')
            ->where('status', '<', '8')
            ->get();
        return view('pages.form.selesai.index', [
            'form' => $form
        ]);
    }

    public function show($id)
    {
        $show = Form::find($id);
        return view('pages.form.selesai.show', [
            'show'   => $show
        ]);
    }

    public function list()
    {
        // dd('maintenante');
        $form = Form::where('status', '8')->get();
        return view('pages.form.selesai.list', [
            'form' => $form
        ]);
    }


    public function resumeRf()
    {
        $form = Form::where('status', '1')->get();
        $jumlah_total = DB::table('form')
            ->whereDay('created_at', '100')
            ->sum('jumlah_total');
        return view('pages.form.selesai.resume', [
            'form' => $form,
            'jumlah_total' => $jumlah_total,
        ]);
    }

    public function reportPB()
    {
        $data  = Reportpb::all();
        $jumlah_a = DB::table('reportpb')
            ->sum('a_b');
        // dd($jumlah_a);
        $jumlah_b = DB::table('reportpb')
            ->sum('b_a');

        $p_uang_kas = DB::table('reportpb')
            ->sum('p_uang_kas');
        return view('pages.form.selesai.reportPB', [
            'data' => $data,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'p_uang_kas' => $p_uang_kas,
        ]);
    }

    public function getLaporan(Request $request)
    {
        // dd($request);
        $from = $request->from . ' ';
        $to = $request->to . ' ';
        $form = Form::whereBetween('created_at', [$from, $to])
            ->where('status', '8')
            ->get();

        // dd($form);
        // $jumlah_total = Form::whereBetween('created_at', [$from, $to])->get()->sum('jumlah_total');


        // dd($jumlah_total);

        return view('pages.form.selesai.getlaporan', [
            'form' => $form,
            'from' => $from,
            'to' => $to,
            // 'jumlah_total' => $jumlah_total,

        ]);
    }
    public function getLaporanDay(Request $request)
    {
        // dd($request);
        $date = $request->input('date');

        // dd($date);
        $form = Form::whereDate('created_at', $date)
            ->where('status', '8')
            ->get();

        // dd($form);

        return view('pages.form.selesai.getlaporanDay', [
            'form' => $form,
            'date' => $date,


        ]);
    }

    public function today()
    {

        // dd('waiting maintenance');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYears = date('Y');
        $form = Form::where('status', '4')
            ->where('payment', 'Cash')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->get();
        // dd($form);
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total = DB::table('form')
            ->where('status', '4')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('payment', 'Cash')
            ->sum('jumlah_total');

        $form2 = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->get();
        $currentDate = Carbon::now()->format('d-m-Y');
        $jumlah_total2 = DB::table('form')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('status', '4')
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_total3 = DB::table('form')
            ->where('status', '4')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->sum('jumlah_total');

        $jumlah_saldo = Reportpb::whereDay(
            'created_at',
            $currentDay
        )
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->sum('jumlah_saldo');

        $jumlah_admin = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->sum('b_admin');

        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        $latestData = Saldo::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->take(1)
            ->get();


        $latestData2 = Reportpb::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->take(1)
            ->get();


        $latestData3 = Tpengajuan::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->take(1)
            ->get();
        // dd($latestData3);


        // dd($latestData);
        return view('pages.form.selesai.today', [
            'form' => $form,
            'jumlah_total' => $jumlah_total,
            'currentDate' => $currentDate,
            'form2' => $form2,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total3' => $jumlah_total3,
            'jumlah_saldo' => $jumlah_saldo,
            'jumlah_admin' => $jumlah_admin,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_saldo' => $jumlah_saldo,
            'latestData' => $latestData,
            'latestData2' => $latestData2,
            'latestData3' => $latestData3

        ]);
    }

    public function printToday()
    {
        $currentDay = date('d');

        $date = date('d-m-Y');

        // $date;
        $currentMonth = date('m');
        $currentYears = date('Y');

        $form = Form::where('status', '4')
            ->where('payment', 'Cash')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->get();
        // dd($form);


        $form2 = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->get();
        $jumlah_total = DB::table('form')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('status', '4')
            ->where('payment', 'Cash')
            ->sum('jumlah_total');
        // ->get();
        // dd($jumlah_total);
        $jumlah_total2 = DB::table('form')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('status', '4')
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_admin = Form::where('status', '4')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('payment', 'Transfer')
            ->sum('b_admin');

        $jumlah_total3 = DB::table('form')
            ->whereDay('approve_date', $currentDay)
            ->whereMonth('approve_date', $currentMonth)
            ->whereYear('approve_date', $currentYears)
            ->where('status', '4')
            ->sum('jumlah_total');
        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        $latestData = Saldo::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->take(1)
            ->get();

        $latestData2 = Reportpb::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYears)
            ->take(1)
            ->get();

        $pdf = PDF::loadview('pages.form.selesai.printToday', [
            'jumlah_admin' => $jumlah_admin,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total' => $jumlah_total,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_total3' => $jumlah_total3,
            'currentDay' => $currentDay,
            'form' => $form,
            'form2' => $form2,
            'latestData' => $latestData,
            'latestData2' => $latestData2,
            'date' => $date,
        ]);
        $pdf->set_paper('letter', 'potrait');
        return $pdf->stream('DAFTAR PENGELUARAN DANA HARIAN.pdf');
    }


    public function export_excelFormrf()
    {
        return Excel::download(new FormPaidExport, 'Request-Fund.xlsx');
    }

    public function cetak_pdf()
    {
        $data = Form::where('status', '8')->get();
        // dd($data);
        $jumlah_total = DB::table('form')
            ->where('status', '8')
            ->where('payment', 'Cash')
            ->sum('jumlah_total');
        // ->get();
        // dd($jumlah_total);
        $jumlah_total2 = DB::table('form')
            ->where('status', '8')
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_admin = Form::where('status', '8')
            ->where('payment', 'Transfer')
            ->sum('b_admin');

        $jumlah_total3 = DB::table('form')
            ->where('status', '8')
            ->sum('jumlah_total');
        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;

        $pdf = PDF::loadview('pages.form.print', [
            'data' => $data,
            'jumlah_admin' => $jumlah_admin,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total' => $jumlah_total,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_total3' => $jumlah_total3,
        ]);
        $pdf->set_paper('letter', 'potrait');
        return $pdf->stream('laporan-request-fund.pdf');
    }

    public function cetak_pdf2($from, $to)
    {
        $data = Form::where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->get();
        $jumlah_total = DB::table('form')
            ->where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->where('payment', 'Cash')
            ->sum('jumlah_total');
        // ->get();
        // dd($jumlah_total);
        $jumlah_total2 = DB::table('form')
            ->where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_admin = Form::where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->where('payment', 'Transfer')
            ->sum('b_admin');

        $jumlah_total3 = DB::table('form')
            ->where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->sum('jumlah_total');
        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        // dd($data);
        $pdf = PDF::loadview('pages.form.printGet', [
            'data' => $data,
            'from' => $from,
            'to' => $to,
            'jumlah_admin' => $jumlah_admin,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total' => $jumlah_total,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_total3' => $jumlah_total3,
        ]);
        $pdf->set_paper('letter', 'potrait');
        return $pdf->stream('laporan-request-fund.pdf');
    }

    public function cetak_pdfDay($date,)
    {
        $data = Form::where('status', '8')
            ->whereDate('created_at', $date)
            ->get();
        $jumlah_total = DB::table('form')
            ->where('status', '8')
            ->whereDate('created_at', $date)
            ->where('payment', 'Cash')
            ->sum('jumlah_total');
        // ->get();
        // dd($jumlah_total);
        $jumlah_total2 = DB::table('form')
            ->where('status', '8')
            ->whereDate('created_at', $date)
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_admin = Form::where('status', '8')
            ->whereDate('created_at', $date)
            ->where('payment', 'Transfer')
            ->sum('b_admin');

        $jumlah_total3 = DB::table('form')
            ->where('status', '8')
            ->whereDate('created_at', $date)
            ->sum('jumlah_total');
        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        // dd($data);
        $pdf = PDF::loadview('pages.form.printGetDay', [
            'data' => $data,
            'date' => $date,
            'jumlah_admin' => $jumlah_admin,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total' => $jumlah_total,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_total3' => $jumlah_total3,
        ]);
        $pdf->set_paper('letter', 'potrait');
        return $pdf->stream('laporan-request-fund.pdf');
    }

    public function cetak_pdfpb()
    {
        $currentDay = date('d');
        $data = Form::where('status', '8')
            ->whereDay('created_at', $currentDay)
            ->get();
        $jumlah_total = DB::table('form')
            ->where('status', '8')
            ->whereDay('created_at', $currentDay)
            ->where('payment', 'Cash')
            ->sum('jumlah_total');
        // ->get();
        // dd($jumlah_total);
        $jumlah_total2 = DB::table('form')
            ->where('status', '8')
            ->whereDay('created_at', $currentDay)
            ->where('payment', 'Transfer')
            ->sum('jumlah_total');
        $jumlah_admin = Form::where('status', '8')
            ->whereDay('created_at', $currentDay)
            ->where('payment', 'Transfer')
            ->sum('b_admin');

        $jumlah_total3 = DB::table('form')
            ->where('status', '8')
            ->whereDay('created_at', $currentDay)
            ->sum('jumlah_total');
        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        // dd($data);
        $pdf = PDF::loadview('pages.form.printGet', [
            'data' => $data,
            'jumlah_admin' => $jumlah_admin,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total' => $jumlah_total,
            'jumlah_akhir' => $jumlah_akhir,
            'jumlah_total3' => $jumlah_total3,
        ]);
        $pdf->set_paper('letter', 'potrait');
        return $pdf->stream('laporan-request-fund-today.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Saldo;
use App\Models\Reportpb;
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
        return view('pages.form.selesai.reportPB', [
            'data' => $data,
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
        // $jumlah_total = Form::whereBetween('created_at', [$from, $to])->get()->sum('jumlah_total');


        // dd($jumlah_total);

        return view('pages.form.selesai.getlaporan', [
            'form' => $form,
            'from' => $from,
            'to' => $to,
            // 'jumlah_total' => $jumlah_total,

        ]);
    }

    public function today()
    {

        // dd('waiting maintenance');
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

        $jumlah_saldo = Reportpb::whereDay(
            'created_at',
            $currentDay
        )->sum('jumlah_saldo');

        $jumlah_admin = Form::where('status', '4')
            ->where('payment', 'Transfer')
            ->whereDay('created_at', $currentDay)
            ->sum('b_admin');

        $jumlah_akhir = $jumlah_total3 + $jumlah_admin;
        $latestData = Saldo::orderBy('created_at', 'desc')
            ->whereDay('created_at', $currentDay)
            ->take(1)
            ->get();

        // dd($latestData);


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
        ]);
    }

    public function printToday($id)
    {
        // $data = Form::find($id);
        $currentDay = date('d');
        $form = Form::find($id)
            ->where('status', '4')
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

        // dd($data);

        $pdf = PDF::loadview('pages.form.selesai.printToday', [
            // 'data' => $data,
            'form' => $form,
            'currentDate' => $currentDate,
            'jumlah_total' => $jumlah_total,
            'form2' => $form2,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total3' => $jumlah_total3,
        ]);
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('Surat-Pengajuan.pdf');
    }

    public function export_excelFormrf()
    {
        return Excel::download(new FormPaidExport, 'Request-Fund.xlsx');
    }

    public function cetak_pdf()
    {
        $data = Form::where('status', '8')->get();
        // dd($data);
        $pdf = PDF::loadview('pages.form.print', [
            'data' => $data
        ]);
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('laporan-pegawai-pdf');
    }

    public function cetak_pdf2($from, $to)
    {
        $data = Form::where('status', '8')
            ->whereBetween('created_at', [$from, $to])
            ->get();
        // dd($data);
        $pdf = PDF::loadview('pages.form.print', [
            'data' => $data
        ]);
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('laporan-pegawai-pdf');
    }
}
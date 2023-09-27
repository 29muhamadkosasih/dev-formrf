<?php

namespace App\Http\Controllers;

use App\Models\Os;
use App\Models\Form;
use App\Models\InvPayment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\InvPaymentExport;
use App\Imports\InvPaymentImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class InvPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('invpayment.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

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
        $mei = 5;
        $jun = 6;
        $jul = 7;
        $ag = 8;
        $sep = 9;
        $ok = 10;
        $nov = 11;
        $des = 12;

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
        $maret = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mar
            )
            ->get()
            ->count();
        $april = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $apr
            )
            ->get()
            ->count();
        $mei = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $mei
            )
            ->get()
            ->count();
        $juni = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jun
            )
            ->get()
            ->count();
        $juli = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $jul
            )
            ->get()
            ->count();
        $agustus = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ag
            )
            ->get()
            ->count();
        $september = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $sep
            )
            ->get()
            ->count();
        $oktober = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $ok
            )
            ->get()
            ->count();
        $november = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $nov
            )
            ->get()
            ->count();
        $desember = DB::table('invpayment')
            ->whereYear('date_invoice', $currentYears)
            ->whereMonth(
                'date_invoice',
                $des
            )
            ->get()
            ->count();

        return view('pages.invpayment.index', [
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
            'maret'  => $maret,
            'april'  => $april,
            'mei'  => $mei,
            'juni'  => $juni,
            'juli'  => $juli,
            'agustus'  => $agustus,
            'september'  => $september,
            'oktober'  => $oktober,
            'november'  => $november,
            'desember'  => $desember,
            'currentYears'  => $currentYears,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.invpayment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amount2 = $request->amount_invoice;
        if ($amount2 == NULL) {
            $data = NULL;
        } else {
            $data = str_replace('.', '', $amount2);
        }

        $amount2 = $request->payment_in;
        if ($amount2 == NULL) {
            $data2 = NULL;
        } else {
            $data2 = str_replace('.', '', $amount2);
        }


        // $data = $request->amount_invoice;
        // $data2 = $request->payment_in;
        $t_deduction = $data - $data2;

        // dd($request);

        $order = new InvPayment();
        $order->no_project = $request->no_project;
        $order->pic_client = $request->pic_client;
        $order->no_invoice = $request->no_invoice;
        $order->no_po = $request->no_po;
        $order->date_invoice = $request->date_invoice;
        $order->amount_invoice = $data;
        $order->payment_in = $data2;
        $order->due_date = $request->due_date;
        $order->paid_date = $request->paid_date;
        // $order->deduction = $request->deduction;
        $order->ket = $request->ket;
        $order->deduction = $t_deduction;
        // $order->no_urut = InvPayment::generateNextSequenceNumber();


        $order->save();
        return redirect()->route('invpayment.index')->with('success', 'Success ! Data Invoice Payment In Berhasil di Tambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = InvPayment::find($id);
        return view('pages.invpayment.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = InvPayment::find($id);
        return view('pages.invpayment.edit', compact(
            'user',
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());
        $payment   = InvPayment::find($id);
        $request->validate([
            'no_project' => 'required',
        ]);

        // $data = 2;
        // $data = $request->amount_invoice;
        // $data2 = $request->payment_in;
        $amount2 = $request->amount_invoice;
        if ($amount2 == NULL) {
            $data = NULL;
        } else {
            $data = str_replace('.', '', $amount2);
        }

        $amount2 = $request->payment_in;
        if ($amount2 == NULL) {
            $data2 = NULL;
        } else {
            $data2 = str_replace(
                '.',
                '',
                $amount2
            );
        }
        // dd($data);
        $t_deduction = $data - $data2;
        $payment->update([
            'no_project' => $request->no_project,
            'pic_client' => $request->pic_client,
            'no_invoice' => $request->no_invoice,
            'no_po' => $request->no_po,
            'date_invoice' => $request->date_invoice,
            'amount_invoice' => $data,
            'payment_in' => $data2,
            'due_date' => $request->due_date,
            'paid_date' => $request->paid_date,
            'deduction' => $t_deduction,
        ]);

        return redirect()->route('invpayment.index')->with('success', 'Success ! Data Invoice Payment In Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $delete = InvPayment::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Success ! Data Invoice Payment In Berhasil di Hapus');
    }

    public function getLaporan(Request $request)
    {
        // dd($request);
        $from = $request->from . ' ';
        $to = $request->to . ' ';
        $kat = $request->kat;
        $invpayment = InvPayment::whereBetween($kat, [$from, $to])
            ->get();

        $jumlah_a = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('amount_invoice');
        $jumlah_b = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('deduction');

        return view('pages.invpayment.getlaporan', [
            'invpayment' => $invpayment,
            'from' => $from,
            'to' => $to,
            'kat' => $kat,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'jumlah_c' => $jumlah_c,

        ]);
    }

    public function getYears(Request $request)
    {
        dd($request);
        $from = $request->from . ' ';
        $to = $request->to . ' ';
        $kat = $request->kat;
        $invpayment = InvPayment::whereBetween($kat, [$from, $to])
            ->get();

        $jumlah_a = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('amount_invoice');
        $jumlah_b = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('invpayment')
            ->whereBetween($kat, [$from, $to])
            ->get()
            ->sum('deduction');

        return view('pages.invpayment.getlaporan', [
            'invpayment' => $invpayment,
            'from' => $from,
            'to' => $to,
            'kat' => $kat,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'jumlah_c' => $jumlah_c,

        ]);
    }

    public function import(Request $request)
    {
        $fileName = request()->file->getClientOriginalName();
        request()->file('file')->storeAs('InvPaymentIn', $fileName, 'public');
        // dd($fileName);
        Excel::import(new InvPaymentImport, $request->file);
        return redirect()->back()->with('success', 'Success ! Data Invoice Payment In Berhasil di Tambahkan');
    }

    public function OStore(Request $request)
    {

        // dd($request->all());
        $amount2 = $request->os_sampai_kemarin;
        if ($amount2 == NULL) {
            $amountWithoutDots2 = NULL;
        } else {
            $amountWithoutDots2 = str_replace('.', '', $amount2);
        }

        $amount3 = $request->pe_invoice;
        if ($amount3 == NULL) {
            $amountWithoutDots3 = NULL;
        } else {
            $amountWithoutDots3 = str_replace('.', '', $amount3);
        }

        $amount4 = $request->os_hari_ini;
        if ($amount4 == NULL) {
            $amountWithoutDots4 = NULL;
        } else {
            $amountWithoutDots4 = str_replace('.', '', $amount4);
        }

        $amount5 = $request->pot;
        if ($amount5 == NULL) {
            $amountWithoutDots5 = NULL;
        } else {
            $amountWithoutDots5 = str_replace('.', '', $amount5);
        }

        $amount6 = $request->pem_hari_ini;
        if ($amount6 == NULL) {
            $amountWithoutDots6 = NULL;
        } else {
            $amountWithoutDots6 = str_replace('.', '', $amount6);
        }
        Os::create([
            'os_sampai_kemarin'   => $amountWithoutDots2,
            'pe_invoice'   => $amountWithoutDots3,
            'os_hari_ini'   => $amountWithoutDots4,
            'pot'   => $amountWithoutDots5,
            'pem_hari_ini'   => $amountWithoutDots6,
        ]);

        return redirect()->route('invpayment.index')->with('success', 'Congratulation !');
    }
}
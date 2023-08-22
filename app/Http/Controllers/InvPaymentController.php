<?php

namespace App\Http\Controllers;

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


        $invpayment = InvPayment::all();
        // $invpayment = InvPayment::orderBy('pic_client', 'asc')->get();

        $jumlah_a = DB::table('invpayment')
            ->get()
            ->sum('amount_invoice');
        $jumlah_b = DB::table('invpayment')
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('invpayment')
            ->get()
            ->sum('deduction');

        return view('pages.invpayment.index', compact('invpayment', 'jumlah_a', 'jumlah_b', 'jumlah_c'));
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
        $data = $request->amount_invoice;
        $data2 = $request->payment_in;
        $t_deduction = $data - $data2;

        $order = new InvPayment();
        $order->no_project = $request->no_project;
        $order->pic_client = $request->pic_client;
        $order->no_invoice = $request->no_invoice;
        $order->no_po = $request->no_po;
        $order->date_invoice = $request->date_invoice;
        $order->amount_invoice = $request->amount_invoice;
        $order->payment_in = $request->payment_in;
        $order->due_date = $request->due_date;
        $order->paid_date = $request->paid_date;
        $order->deduction = $t_deduction;


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
        $data = $request->amount_invoice;
        $data2 = $request->payment_in;
        // dd($data);
        $t_deduction = $data - $data2;
        $payment->update([
            'no_project' => $request->no_project,
            'pic_client' => $request->pic_client,
            'no_invoice' => $request->no_invoice,
            'no_po' => $request->no_po,
            'date_invoice' => $request->date_invoice,
            'amount_invoice' => $request->amount_invoice,
            'payment_in' => $request->payment_in,
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
        $invpayment = InvPayment::whereBetween('created_at', [$from, $to])
            ->get();

        $jumlah_a = DB::table('invpayment')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('amount_invoice');
        $jumlah_b = DB::table('invpayment')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('invpayment')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('deduction');

        return view('pages.invpayment.getlaporan', [
            'invpayment' => $invpayment,
            'from' => $from,
            'to' => $to,
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
}

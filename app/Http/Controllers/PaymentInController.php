<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\PaymentIn;
use Illuminate\Support\Facades\Gate;


class PaymentInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('paymentIn.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $payment = PaymentIn::all();
        return view('pages.paymentIn.index', [
            'payment' => $payment,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('paymentIn.create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        return view('pages.paymentIn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'amount' => 'required|numeric',
        ]);
        $data = 2;
        $t_deduction = ($data / 100) * $request->amount;

        $order = new PaymentIn();
        $order->no_invoice = PaymentIn::generateInvoiceNumber();
        $order->client = $request->client;
        $order->amount = $request->amount;
        $order->deduction = $t_deduction;
        $order->save();


        return redirect()->route('paymentIn.index')->with('success', 'Success ! Data PaymentIn Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data   = PaymentIn::find($id);

        return view('pages.paymentIn.show', [
            'data' => $data
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
        abort_if(Gate::denies('paymentIn.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $edit = PaymentIn::find($id);
        $data = PaymentIn::all();
        return view('pages.paymentIn.edit', [
            'edit'   => $edit,
            'data'    => $data
        ]);
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
        $payment   = PaymentIn::find($id);
        $request->validate([
            'client' => 'required',
            'amount' => 'required|numeric',
        ]);

        $data = 2;
        $t_deduction = ($data / 100) * $request->amount;
        $payment->update([
            'no_invoice' => $request->no_invoice,
            'client' => $request->client,
            'amount' => $request->amount,
            'deduction' => $t_deduction,
        ]);

        return redirect()->route('paymentIn.index')
            ->with('success', 'Success ! Data PaymentIn Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('paymentIn.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $delete = PaymentIn::find($id);
        $delete->delete();
        return redirect()->route('paymentIn.index')
            ->with('success', 'Success ! Data PaymentIn Berhasil di Hapus');
    }

    public function report()
    {
        abort_if(Gate::denies('paymentIn.report'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $currentDay = date('d');
        $currentDay2 = date('d M Y');

        // dd($currentDay2);
        $payment = PaymentIn::whereDay('created_at', $currentDay)->get();
        // dd($payment);
        $total_amount = PaymentIn::whereDay('created_at', $currentDay)
            ->sum('amount');
        $total_deduction = PaymentIn::whereDay('created_at', $currentDay)
            ->sum('deduction');

        return view('pages.paymentIn.report', [
            'payment' => $payment,
            'total_deduction' => $total_deduction,
            'total_amount' => $total_amount,
            'currentDay2' => $currentDay2,
        ]);
    }
}

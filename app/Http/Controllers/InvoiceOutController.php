<?php

namespace App\Http\Controllers;

use App\Models\InvoiceOut;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class InvoiceOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('invoiceOut.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $InvoiceOut = InvoiceOut::all();
        return view('pages.InvoiceOut.index', [
            'InvoiceOut' => $InvoiceOut,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('invoiceOut.create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('pages.InvoiceOut.create');
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

        $order = new InvoiceOut();
        $order->no_invoice = InvoiceOut::generateInvoiceNumber();
        $order->client = $request->client;
        $order->amount = $request->amount;
        $order->save();

        return redirect()->route('invoiceOut.index')->with('success', 'Success ! Data InvoiceOut Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data   = InvoiceOut::find($id);

        return view('pages.InvoiceOut.show', [
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
        abort_if(Gate::denies('invoiceOut.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $edit = InvoiceOut::find($id);
        $data = InvoiceOut::all();
        return view('pages.InvoiceOut.edit', [
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
        $InvoiceOut   = InvoiceOut::find($id);
        $request->validate([
            'client' => 'required',
            'amount' => 'required|numeric',
        ]);

        $InvoiceOut->update([
            'no_invoice' => $request->no_invoice,
            'client' => $request->client,
            'amount' => $request->amount,
        ]);

        return redirect()->route('invoiceOut.index')
            ->with('success', 'Success ! Data InvoiceOut Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('invoiceOut.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $delete = InvoiceOut::find($id);
        $delete->delete();
        return redirect()->route('invoiceOut.index')
            ->with('success', 'Success ! Data InvoiceOut Berhasil di Hapus');
    }

    public function report()
    {
        abort_if(Gate::denies('invoiceOut.report'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $currentDay = date('d');
        $currentDay2 = date('d M Y');

        // dd($currentDay2);
        $InvoiceOut = InvoiceOut::whereDay('created_at', $currentDay)->get();
        // dd($InvoiceOut);
        $total_amount = InvoiceOut::whereDay('created_at', $currentDay)
            ->sum('amount');

        return view('pages.InvoiceOut.report', [
            'InvoiceOut' => $InvoiceOut,
            'total_amount' => $total_amount,
            'currentDay2' => $currentDay2,
        ]);
    }
}

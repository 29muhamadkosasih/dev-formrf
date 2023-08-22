<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\ReportPPH23;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\ReportPPH23Export;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ReportPPH23Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $jumlah_a = DB::table('reportpph23')
            ->get()
            ->sum('bruto');
        $jumlah_b = DB::table('reportpph23')
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('reportpph23')
            ->get()
            ->sum('pph23');

        $reportpph = ReportPPH23::all();
        return view('pages.reportpph.index', compact('reportpph', 'jumlah_a', 'jumlah_b', 'jumlah_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.reportpph.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ReportPPH23::create([
            'client' => $request->client,
            'no_invoice' => $request->no_invoice,
            'bruto' => $request->bruto,
            'payment_in' => $request->payment_in,
            'paid_date' => $request->paid_date,
            'pph23'    => $request->pph23,
            'npwp'    => $request->npwp,
            'masa_pajak'    => $request->masa_pajak,
            'no_bukpot'    => $request->no_bukpot,
            'tgl_pemotongan'    => $request->tgl_pemotongan,

        ]);
        return redirect()->route('reportpph.index')->with('success', 'Success ! Data reportpph Berhasil di Tambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = ReportPPH23::find($id);
        return view('pages.reportpph.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = ReportPPH23::find($id);
        return view('pages.reportpph.edit', compact(
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
        $input  = $request->all();
        $user = ReportPPH23::find($id);

        // dd($request);
        $user->update($input);
        return redirect()->route('reportpph.index')->with('success', 'Success ! Data reportpph Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete = ReportPPH23::find($id);
        $delete->delete();
        return redirect()->route('reportpph.index')
            ->with('success', 'Success ! Data ReportPPH23 Berhasil di Hapus');
    }

    public function getLaporan(Request $request)
    {
        // dd($request);
        $from = $request->from . ' ';
        $to = $request->to . ' ';
        $reportpph = ReportPPH23::whereBetween('created_at', [$from, $to])
            ->get();

        $jumlah_a = DB::table('reportpph23')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('bruto');
        $jumlah_b = DB::table('reportpph23')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('payment_in');
        $jumlah_c = DB::table('reportpph23')
            ->whereBetween('created_at', [$from, $to])
            ->get()
            ->sum('pph23');

        return view('pages.reportpph.getlaporan', [
            'reportpph' => $reportpph,
            'from' => $from,
            'to' => $to,
            'jumlah_a' => $jumlah_a,
            'jumlah_b' => $jumlah_b,
            'jumlah_c' => $jumlah_c,

        ]);
    }

    public function export_excel()
    {
        return Excel::download(new ReportPPH23Export, 'Report-PPH23.xlsx');
    }
}

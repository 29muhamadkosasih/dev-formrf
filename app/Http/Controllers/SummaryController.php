<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use PDF;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('summary.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $resume  = Resume::all();
        $rasio  = Resume::all();
        return view('pages.cash-flow.summary.index', [
            'resume' => $resume,
            'rasio' => $rasio,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cash-flow.summary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printPdf()
    {
        $resume  = Resume::all();
        $rasio  = Resume::all();
        $pdf = PDF::loadview('pages.cash-flow.summary.pdf', [
            'resume' => $resume,
            'rasio' => $rasio,
        ]);
        $pdf->set_paper('a4', 'landscape');
        return $pdf->stream('SUMMARY.pdf');
    }
}
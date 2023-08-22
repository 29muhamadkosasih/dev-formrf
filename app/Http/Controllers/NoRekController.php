<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\NoRek;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Imports\DatabaseUsersImport;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class NoRekController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('norek.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $norek = NoRek::all();
        $userId2 = auth()->id();
        $userId = auth()->id();
        $bank = Bank::all();
        $norekk = NoRek::where('user_id', $userId2)->get();


        // dd($bank);

        return view('pages.norek.index', [
            'norek'   => $norek,
            'bank'    => $bank,
            'userId'  => $userId,
            'norekk'   => $norekk

        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_penerima' => 'required|max:255|min:4',
            'no_rekening' => 'required|max:17|min:10',
            'bank_id' => 'required|numeric',
        ]);
        // dd($request);
        NoRek::create($validateData);
        return redirect()->route('norek.index')->with(
            'success',
            'Success ! Data Bank Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        abort_if(Gate::denies('norek.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = NoRek::find($id);
        $bank = Bank::all();
        $norek = NoRek::all();
        $userId = auth()->id();
        $userId2 = auth()->id();
        $norekk = NoRek::where('user_id', $userId2)->get();



        return view('pages.norek.index', [
            'edit'   => $edit,
            'bank'   => $bank,
            'norek'   => $norek,
            'userId'  => $userId,
            'norekk'   => $norekk


        ]);
    }

    public function update(Request $request, $id)
    {
        $norek   = NoRek::find($id);
        $this->validate($request, [
            'nama_penerima' => 'required|max:255|min:4',
            'no_rekening' => 'required|max:17|min:10|unique:norek,no_rekening',
            'bank_id' => 'required|numeric',
            'user_id' => 'required',
        ]);

        $norek->update([
            'nama_penerima'   => $request->nama_penerima,
            'no_rekening'   => $request->no_rekening,
            'bank_id'   => $request->bank_id,
            'user_id'   => $request->user_id,
        ]);

        return redirect()->route('norek.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('norek.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = NoRek::find($id);
        $delete->delete();
        return redirect()->route('norek.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Hapus'
            );
    }

    public function import(Request $request)
    {
        $fileName = request()->file->getClientOriginalName();
        request()->file('file')->storeAs('DatabaseUsers', $fileName, 'public');
        // dd($fileName);
        Excel::import(new DatabaseUsersImport, $request->file);
        return redirect()->back()->with('success', 'Success ! Data Users Berhasil di Tambahkan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class BankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $bank = Bank::orderBy('nama_bank', 'asc')
            ->get();
        return view('pages.bank.index', [
            'bank'    => $bank
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required|max:255|min:5|unique:bank',
        ]);
        Bank::create($request->all());
        return redirect()->route('bank.index')->with('success', 'Success ! Data Bank Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('bank.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $edit = Bank::find($id);
        $bank = Bank::all();
        return view('pages.bank.index', [
            'edit'   => $edit,
            'bank'    => $bank
        ]);
    }

    public function update(Request $request, $id)
    {
        $bank   = Bank::find($id);
        $this->validate($request, [
            'nama_bank' => 'required|max:255|min:5|unique:bank',
        ]);
        $bank->update([
            'nama_bank'   => $request->nama_bank
        ]);

        return redirect()->route('bank.index')
            ->with('success', 'Success ! Data Bank Berhasil di Update');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('bank.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $delete = Bank::find($id);
        $delete->delete();
        return redirect()->route('bank.index')
            ->with('success', 'Success ! Data Bank Berhasil di Hapus');
    }
}
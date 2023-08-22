<?php

namespace App\Http\Controllers;

use App\Models\Kpengajuan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class KpengajuanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kpengajuan.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $kpengajuan = Kpengajuan::all();

        // dd($bank);

        return view('pages.kpengajuan.index', [
            'kpengajuan'    => $kpengajuan,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255|min:3|unique:kpengajuan',
        ]);
        Kpengajuan::create($validateData);
        return redirect()->route('kpengajuan.index')->with(
            'success',
            'Success ! Data Bank Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('kpengajuan.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = Kpengajuan::find($id);
        $kpengajuan = Kpengajuan::all();

        return view('pages.kpengajuan.index', [
            'edit'   => $edit,
            'kpengajuan'   => $kpengajuan
        ]);
    }

    public function update(Request $request, $id)
    {
        $kpengajuan   = Kpengajuan::find($id);
        $this->validate($request, [
            'name' => 'required|max:255|min:3|unique:kpengajuan',
        ]);
        $kpengajuan->update([
            'name'   => $request->name
        ]);

        return redirect()->route('kpengajuan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('kpengajuan.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Kpengajuan::find($id);
        $delete->delete();
        return redirect()->route('kpengajuan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Hapus'
            );
    }
}
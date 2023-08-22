<?php

namespace App\Http\Controllers;

use App\Models\Keperluan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class KeperluanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keperluan.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $keperluan = Keperluan::all();

        // dd($bank);

        return view('pages.keperluan.index', [
            'keperluan'    => $keperluan,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255|min:3|unique:keperluan',

        ]);
        Keperluan::create($validateData);
        return redirect()->route('keperluan.index')->with(
            'success',
            'Success ! Data Bank Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('keperluan.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = keperluan::find($id);
        $keperluan = keperluan::all();

        return view('pages.keperluan.index', [
            'edit'   => $edit,
            'keperluan'   => $keperluan
        ]);
    }

    public function update(Request $request, $id)
    {
        $keperluan   = Keperluan::find($id);
        $this->validate($request, [
            'name' => 'required|max:255|min:3|unique:keperluan',
        ]);
        $keperluan->update([
            'name'   => $request->name
        ]);

        return redirect()->route('keperluan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('keperluan.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Keperluan::find($id);
        $delete->delete();
        return redirect()->route('keperluan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Hapus'
            );
    }
}

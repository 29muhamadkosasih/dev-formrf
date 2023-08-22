<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class JabatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jabatan.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $jabatan = Jabatan::orderBy('created_at', 'asc')->get();

        // dd($bank);

        return view('pages.jabatan.index', [
            'jabatan'    => $jabatan,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jabatan' => 'required|max:255|min:3|unique:jabatan',
        ]);
        // dd($request);
        Jabatan::create($validateData);
        return redirect()->route('jabatan.index')->with(
            'success',
            'Success ! Data Jabatan Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('jabatan.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = Jabatan::find($id);
        $jabatan = Jabatan::all();

        return view('pages.jabatan.index', [
            'edit'   => $edit,
            'jabatan'   => $jabatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $jabatan   = Jabatan::find($id);
        $this->validate($request, [
            'jabatan' => 'required|max:255|min:3|unique:jabatan',
        ]);
        $jabatan->update([
            'jabatan'   => $request->jabatan
        ]);

        return redirect()->route('jabatan.index')
            ->with(
                'success',
                'Success ! Data Jabatan Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('jabatan.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Jabatan::find($id);
        $delete->delete();
        return redirect()->route('jabatan.index')
            ->with(
                'success',
                'Success ! Data Jabatan Berhasil di Hapus'
            );
    }
}
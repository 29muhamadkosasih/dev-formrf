<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DepartementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('departement.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $departement = Departement::all();

        // dd($bank);

        return view('pages.departement.index', [
            'departement'    => $departement,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_departement' => 'required|max:255|min:3|unique:departement',
        ]);
        // dd($request);
        Departement::create($validateData);
        return redirect()->route('departement.index')->with(
            'success',
            'Success ! Data Departement Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('departement.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = Departement::find($id);
        $departement = Departement::all();

        return view('pages.departement.index', [
            'edit'   => $edit,
            'departement'   => $departement
        ]);
    }

    public function update(Request $request, $id)
    {
        $departement   = Departement::find($id);
        $this->validate($request, [
            'nama_departement' => 'required|max:255|min:3|unique:departement',
        ]);
        $departement->update([
            'nama_departement'   => $request->nama_departement
        ]);

        return redirect()->route('departement.index')
            ->with(
                'success',
                'Success ! Data Departement Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('departement.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Departement::find($id);
        $delete->delete();
        return redirect()->route('departement.index')
            ->with(
                'success',
                'Success ! Data Departement Berhasil di Hapus'
            );
    }
}
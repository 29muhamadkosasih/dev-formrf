<?php

namespace App\Http\Controllers;

use App\Models\Rujukan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RujukanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rujukan.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $rujukan = Rujukan::all();

        // dd($bank);

        return view('pages.rujukan.index', [
            'rujukan'    => $rujukan,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255|min:3|unique:rujukan',
        ]);
        // dd($request);
        Rujukan::create($validateData);
        return redirect()->route('rujukan.index')->with(
            'success',
            'Success ! Data Bank Berhasil di Tambahkan'
        );
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('rujukan.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = Rujukan::find($id);
        $rujukan = Rujukan::all();

        return view('pages.rujukan.index', [
            'edit'   => $edit,
            'rujukan'   => $rujukan
        ]);
    }

    public function update(Request $request, $id)
    {
        $rujukan   = Rujukan::find($id);
        $this->validate($request, [
            'name' => 'required|max:255|min:3|unique:rujukan',
        ]);
        $rujukan->update([
            'name'   => $request->name
        ]);

        return redirect()->route('rujukan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Update'
            );
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('rujukan.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Rujukan::find($id);
        $delete->delete();
        return redirect()->route('rujukan.index')
            ->with(
                'success',
                'Success ! Data Bank Berhasil di Hapus'
            );
    }
}
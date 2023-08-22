<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Jabatan;
use App\Exports\UserExport;
use App\Models\Departement;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Imports\DatabaseUsersImport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('users.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $users = User::with('role')
            ->orderBy('name', 'asc')
            ->get();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('users.create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $jabatan = Jabatan::all();
        $departement = Departement::all();
        $roles = Role::pluck('title', 'id');
        return view('pages.users.create', [
            'jabatan'   => $jabatan,
            'departement'  => $departement,
            'roles'   => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'jabatan_id' => $request->jabatan_id,
            'departement_id' => $request->departement_id,
            'role_id'    => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'Success ! Data Users Berhasil di Tambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('users.show'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $data = User::find($id);
        return view('pages.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('users.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $user = User::find($id);
        $jabatan = Jabatan::all();
        $departement = Departement::all();
        $roles = Role::pluck('title', 'id');
        return view('pages.users.edit', compact(
            'user',
            'roles',
            'jabatan',
            'departement'
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

        // dd($request);
        $user = User::find($id);

        // dd($request);
        $user->update($input);
        return redirect()->route('users.index')->with('success', 'Success ! Data Users Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('users.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $user->delete();
        return redirect()->back()->with('success', 'Success ! Data Users Berhasil di Hapus');
    }

    public function import(Request $request)
    {
        $fileName = request()->file->getClientOriginalName();
        request()->file('file')->storeAs('DatabaseUsers', $fileName, 'public');
        // dd($fileName);
        Excel::import(new DatabaseUsersImport, $request->file);
        return redirect()->back()->with('success', 'Success ! Data Users Berhasil di Tambahkan');
    }

    public function export_excel()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }
}
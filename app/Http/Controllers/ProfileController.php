<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('profile.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $user =User::where('id', $userId)->get();
        return view('pages.me.index',[
        'user'   =>$user
        ]);
    }

    public function edit($id)
    {
        $edit = User::find($id);
        return view('pages.me.edit',[
            'edit'   =>$edit
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan_id' => $request->jabatan_id,
        ]);
            // dd($data);

        // dd($data);

        return redirect()->route('me.index')
        ->with('success', 'Congratulation !  Data Berhasil diupdate');

    }
}
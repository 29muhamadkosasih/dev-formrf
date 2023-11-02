<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Rujukan;
use App\Models\Keperluan;
use App\Models\Kpengajuan;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class MancheckedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form-checkedman.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        // dd($id);
        $departement = Departement::all();
        $form = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $ids = [1];
        $tdpmarketing = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', $ids)
            ->get();

        $tdpadmin = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->where('departement_id', '2')
            ->get();

        $tdpadmin = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', [2, 6])
            ->get();

        $tkki = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', [17, 18, 16, 19])
            ->get();
        // dd($tkki);

        $tdp_op = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', [3, 4, 9, 10, 11])
            ->get();

        $tdp_hr = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', [7, 8, 5, 32])
            ->get();

        $tti = Form::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->whereIn('departement_id', [12, 13, 14, 15])
            ->get();

        return view('pages.form.checkedman.index', [
            'form'   => $form,
            'departement'  => $departement,
            'tdpmarketing'  => $tdpmarketing,
            'tdpadmin'  => $tdpadmin,
            'tkki'  => $tkki,
            'tdp_op'  => $tdp_op,
            'tdp_hr'  => $tdp_hr,
            'tti'  => $tti,
        ]);
    }

    public function show($id)
    {
        $show = Form::find($id);
        return view('pages.form.checkedman.show', [
            'show'   => $show
        ]);
    }

    public function detail($id)
    {

        $show = Form::find($id);
        // dd($show);
        return view('pages.form.checkedman.detail', [
            'show'   => $show
        ]);
    }

    public function edit($id)
    {

        $edit = Form::find($id);
        $departement = Departement::all();
        $kpengajuan = Kpengajuan::all();
        $keperluan = Keperluan::all();
        $rujukan = Rujukan::all();

        return view('pages.form.checkedman.edit', [
            'edit'   => $edit,
            'departement'  => $departement,
            'kpengajuan'   => $kpengajuan,
            'keperluan'   => $keperluan,
            'rujukan'   => $rujukan,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = Form::findOrFail($id);

        $amount = $request->input('price');
        $amountWithoutDots = str_replace('.', '', $amount);
        $amount2 = $request->price2;
        if ($amount2 == NULL) {
            $amountWithoutDots2 = NULL;
        } else {
            $amountWithoutDots2 = str_replace('.', '', $amount2);
        }

        $amount3 = $request->price3;
        if ($amount3 == NULL) {
            $amountWithoutDots3 = NULL;
        } else {
            $amountWithoutDots3 = str_replace('.', '', $amount3);
        }


        $amount4 = $request->price4;
        if ($amount4 == NULL) {
            $amountWithoutDots4 = NULL;
        } else {
            $amountWithoutDots4 = str_replace('.', '', $amount4);
        }

        $amount5 = $request->price5;
        if ($amount5 == NULL) {
            $amountWithoutDots5 = NULL;
        } else {
            $amountWithoutDots5 = str_replace('.', '', $amount5);
        }

        $amount6 = $request->price6;
        if ($amount6 == NULL) {
            $amountWithoutDots6 = NULL;
        } else {
            $amountWithoutDots6 = str_replace('.', '', $amount6);
        }

        $amount7 = $request->price7;
        if ($amount7 == NULL) {
            $amountWithoutDots7 = NULL;
        } else {
            $amountWithoutDots7 = str_replace('.', '', $amount7);
        }

        $amount8 = $request->price8;
        if ($amount8 == NULL) {
            $amountWithoutDots8 = NULL;
        } else {
            $amountWithoutDots8 = str_replace('.', '', $amount8);
        }

        $total = $request->qty * $amountWithoutDots;
        $total2 = $request->qty2 * $amountWithoutDots2;
        $total3 = $request->qty3 * $amountWithoutDots3;
        $total4 = $request->qty4 * $amountWithoutDots4;
        $total5 = $request->qty5 * $amountWithoutDots5;
        $total6 = $request->qty6 * $amountWithoutDots6;
        $total7 = $request->qty7 * $amountWithoutDots7;
        $total8 = $request->qty8 * $amountWithoutDots8;


        $jumlah = $total + $total2;
        $jumlah2 = $total3 + $total4;
        $jumlah3 = $total5 + $total6;
        $jumlah4 = $total7 + $total8;

        $total_jumlah1 = $jumlah + $jumlah2;
        $total_jumlah2 = $jumlah3 + $jumlah4;

        $jumlah_akhir = $total_jumlah1 + $total_jumlah2;

        $data2 = $request->norek_id;
        if ($data2 == NULL) {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        } else {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        };
        // dd($jumlah_total_akhir);

        $data->update([
            'from_id' => $request->from_id,
            'rujukan_id' => $request->rujukan_id,
            'kpengajuan_id' => $request->kpengajuan_id,
            'departement_id' => $request->departement_id,
            'keperluan_id' => $request->keperluan_id,
            'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
            'payment' => $request->payment,
            'description' => $request->description,
            'unit' => $request->unit,
            'qty' => $request->qty,
            'price' => $amountWithoutDots,
            'total' => $total,
            'description2' => $request->description2,
            'unit2' => $request->unit2,
            'qty2' => $request->qty2,
            'price2' => $amountWithoutDots2,
            'total2' => $total2,
            'description3' => $request->description3,
            'unit3' => $request->unit3,
            'qty3' => $request->qty3,
            'price3' => $amountWithoutDots3,
            'total3' => $total3,
            'description4' => $request->description4,
            'unit4' => $request->unit4,
            'qty4' => $request->qty4,
            'price4' => $amountWithoutDots4,
            'total4' => $total4,
            'description5' => $request->description5,
            'unit5' => $request->unit5,
            'qty5' => $request->qty5,
            'price5' => $amountWithoutDots5,
            'total5' => $total5,
            'description6' => $request->description6,
            'unit6' => $request->unit6,
            'qty6' => $request->qty6,
            'price6' => $amountWithoutDots6,
            'total6' => $total6,
            'description7' => $request->description7,
            'unit7' => $request->unit7,
            'qty7' => $request->qty7,
            'price7' => $amountWithoutDots7,
            'total7' => $total7,
            'description8' => $request->description8,
            'unit8' => $request->unit8,
            'qty8' => $request->qty8,
            'price8' => $amountWithoutDots8,
            'total8' => $total8,
            'jumlah_total' => $jumlah_total_akhir,
            'norek_id' => $request->norek_id,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'image3' => $request->image3,
            'image4' => $request->image4,
            'image5' => $request->image5,
            'image6' => $request->image6,
            'image7' => $request->image7,
            'image8' => $request->image8,
            'no_project'  => $request->no_project,
            'j_peserta'  => $request->j_peserta,
            'j_traine_asesor'  => $request->j_traine_asesor,
            'j_assist'  => $request->j_assist
        ]);

        // dd($data);
        return redirect()->route('form-checkedman.index')
            ->with('success', 'Congratulation !  Data Berhasil DiUpdate');
    }

    public function approve($id)
    {
        $userId = auth()->id();
        $date = date('y-m-d');
        $data = Form::where('id', $id)->first();
        $data->update(
            [
                "status" => "2",
                "checked_by"  => $userId,
                "checked_date" => $date

            ]
        );
        return redirect()->route('form-checkedman.index')
            ->with('success', 'Congratulation !  Data Berhasil Di Approve');
    }

    public function paid($id)
    {
        $userId = auth()->id();
        $date = date('y-m-d');
        $data = Form::where('id', $id)->first();
        $data->update(
            [
                "status" => "8",

            ]
        );
        return back()
            ->with('success', 'Congratulation ! Konfirmasi Pengembalian Berhasil');
    }

    public function del1($id)
    {
        $data = Form::find($id);
        $data->update(
            [
                "image1"  => 0,
            ]
        );
        return back()
            ->with('success',  'Berhasil');
    }

    public function reject($id)
    {
        $userId = auth()->id();
        $date = date('y-m-d');
        $data = Form::where('id', $id)->first();
        $data->update(
            [
                "status" => "1",
                "checked_by"  => $userId,
                "checked_date" => $date
            ]
        );
        return back()
            ->with('success', 'Congratulation !  Data Berhasil Di Reject');
    }

    public function destroy($id)
    {
        $delete = Form::find($id);

        $destination = 'storage/MD/' . $delete->image1;
        File::delete($destination);

        if ($delete->image2 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image2;
            File::delete($destination);
        }

        if ($delete->image3 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image3;
            File::delete($destination);
        }

        if ($delete->image4 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image4;
            File::delete($destination);
        }

        if ($delete->image5 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image5;
            File::delete($destination);
        }

        if ($delete->image6 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image6;
            File::delete($destination);
        }

        if ($delete->image7 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image7;
            File::delete($destination);
        }

        if ($delete->image8 == NULL) {
        } else {
            $destination = 'storage/MD/' . $delete->image8;
            File::delete($destination);
        }


        $delete->delete();
        return redirect()->route('form-checkedman.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Hapus'
            );
    }

    public function showDetailCek($id)
    {
        // abort_if(Gate::denies('form.show'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $show = Form::find($id);

        // dd($show->file);
        return view('pages.form.checked.showDetail', [
            'show'   => $show
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Bank;
use App\Models\Form;
use App\Models\User;
use App\Models\NoRek;
use App\Models\Rujukan;
use App\Models\Keperluan;
use App\Models\Kpengajuan;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Rules\CustomKeywordValidation;
use Illuminate\Support\Facades\Storage;


class FormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $bank = Bank::get();
        $norek = NoRek::all();
        $kpengajuan = Kpengajuan::all();
        $keperluan = Keperluan::all();
        $rujukan = Rujukan::where('id', '<', '3')->get();

        // dd($norek);

        $form = Form::where('from_id', $userId)
            ->where('status', '<', 8)
            ->orderBy('created_at', 'desc')
            ->get();

        $role = User::where('jabatan_id', $userId)->get();
        $departement = Departement::all();
        // dd($form);
        return view('pages.form.index', [
            'form'   => $form,
            'role'   => $role,
            'bank'   => $bank,
            'departement' => $departement,
            'kpengajuan'   => $kpengajuan,
            'keperluan'   => $keperluan,
            'rujukan'   => $rujukan,
            'norek'   => $norek,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $userId = auth()->id();
        $username = Auth::user()->name;
        $request->validate([
            'qty' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'departement_id' => 'required|numeric',
            'kpengajuan_id' => 'required|numeric',
            'payment' => ['required', 'in:Cash,Transfer'],
            'rujukan_id' => 'required|numeric',
            'keperluan_id' => 'required|numeric',
        ]);

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

        $data = $request->norek_id;
        if ($data == NULL) {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        } else {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        }

        $randomString = Str::random(5);

        // $acak =$username . '_', $username;

        $documentNumber = $username . $randomString;
        $data2 = $request->image1;
        if ($data2 == NULL) {
            $filename1 = 0;
        } else {
            if ($request->hasFile('image1')) {
                $this->validate($request, [
                    'image1'          => 'mimes:jpeg,png,jpg,gif,pdf|max:15048',
                ]);
                $file               = $request->file('image1');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename1          = 'Lampiran1_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename1);
            }
        }

        // dd($filename1);

        $data3 = $request->image2;
        if ($data3 == NULL) {
            $filename2 = 0;
        } else {
            if ($request->hasFile('image2')) {
                $this->validate($request, [
                    'image2'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image2');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename2          = 'Lampiran2_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename2);
            }
        }
        $data4 = $request->image3;
        if ($data4 == NULL) {
            $filename3 = 0;
        } else {
            if ($request->hasFile('image3')) {
                $this->validate($request, [
                    'image3'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image3');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename3          = 'Lampiran3_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename3);
            }
        }
        $data5 = $request->image4;
        if ($data5 == NULL) {
            $filename4 = 0;
        } else {
            if ($request->hasFile('image4')) {
                $this->validate($request, [
                    'image4'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image4');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename4          = 'Lampiran4_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename4);
            }
        }
        $data6 = $request->image5;
        if ($data6 == NULL) {
            $filename5 = 0;
        } else {
            if ($request->hasFile('image5')) {
                $this->validate($request, [
                    'image5'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image5');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename5          = 'Lampiran5_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename5);
            }
        }
        $data7 = $request->image6;
        if ($data7 == NULL) {
            $filename6 = 0;
        } else {
            if ($request->hasFile('image6')) {
                $this->validate($request, [
                    'image6'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image6');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename6         = 'Lampiran6_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename6);
            }
        }
        $data8 = $request->image7;
        if ($data8 == NULL) {
            $filename7 = 0;
        } else {
            if ($request->hasFile('image7')) {
                $this->validate($request, [
                    'image7'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image7');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename7          = 'Lampiran7_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename7);
            }
        }
        $data9 = $request->image8;
        if ($data9 == NULL) {
            $filename8 = 0;
        } else {
            if ($request->hasFile('image8')) {
                $this->validate($request, [
                    'image8'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image8');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename8          = 'Lampiran8_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename8);
            }
        }

        // dd($request->all());

        Form::create([
            'from_id' => $userId,
            'rujukan_id' => $request->rujukan_id,
            'kpengajuan_id' => $request->kpengajuan_id,
            'keperluan_id' => $request->keperluan_id,
            'departement_id' => $request->departement_id,
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
            // 'file' => $filename,
            'image1' => $filename1,
            'image2' => $filename2,
            'image3' => $filename3,
            'image4' => $filename4,
            'image5' => $filename5,
            'image6' => $filename6,
            'image7' => $filename7,
            'image8' => $filename8,
            'status' => 0,
            'no_project'  => $request->no_project,
            'j_peserta'  => $request->j_peserta,
            'j_traine_asesor'  => $request->j_traine_asesor,
            'j_assist'  => $request->j_assist
        ]);

        return redirect()->route('form.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Tambahkan'
            );
    }


    public function show($id)
    {
        abort_if(Gate::denies('form.show'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $show = Form::find($id);

        // dd($show->file);
        return view('pages.form.show', [
            'show'   => $show
        ]);
    }

    public function showDetail($id)
    {
        abort_if(Gate::denies('form.show'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $show = Form::find($id);

        // dd($show->file);
        return view('pages.form.showDetail', [
            'show'   => $show
        ]);
    }

    public function edit($id)
    {
        abort_if(Gate::denies('form.edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $edit = Form::find($id);
        $departement = Departement::all();
        $kpengajuan = Kpengajuan::all();
        $keperluan = Keperluan::all();
        $rujukan = Rujukan::where('id', '<', '3')->get();
        $norek = NoRek::get();

        return view('pages.form.edit', [
            'edit'   => $edit,
            'departement' => $departement,
            'kpengajuan'   => $kpengajuan,
            'keperluan'   => $keperluan,
            'rujukan'   => $rujukan,
            'norek'   => $norek,

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keperluan_id' => 'required',
            'kpengajuan_id' => 'required'
        ]);

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

        $data10 = $request->norek_id;
        if ($data10 == NULL) {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        } else {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        }
        $userId = auth()->id();
        $data = Form::findOrFail($id);

        $data->from_id = $userId;
        $data->rujukan_id = $request->input('rujukan_id');
        $data->kpengajuan_id = $request->input('kpengajuan_id');
        $data->keperluan_id = $request->input('keperluan_id');
        $data->departement_id = $request->input('departement_id');
        $data->payment = $request->input('payment');
        $data->tanggal_kebutuhan = $request->input('tanggal_kebutuhan');
        $data->unit = $request->input('unit');
        $data->qty = $request->input('qty');
        $data->price = $amountWithoutDots;
        $data->total = $total;
        $data->description = $request->input('description');

        $data->unit2 = $request->input('unit2');
        $data->qty2 = $request->input('qty2');
        $data->price2 = $amountWithoutDots2;
        $data->total2 = $total2;
        $data->description2 = $request->input('description2');


        $data->unit3 = $request->input('unit3');
        $data->qty3 = $request->input('qty3');
        $data->price3 = $amountWithoutDots3;
        $data->total3 = $total3;
        $data->description3 = $request->input('description3');


        $data->unit4 = $request->input('unit4');
        $data->qty4 = $request->input('qty4');
        $data->price4 = $amountWithoutDots4;
        $data->total4 = $total4;
        $data->description4 = $request->input('description4');


        $data->unit5 = $request->input('unit5');
        $data->qty5 = $request->input('qty5');
        $data->price5 = $amountWithoutDots5;
        $data->total5 = $total5;
        $data->description5 = $request->input('description5');


        $data->unit6 = $request->input('unit6');
        $data->qty6 = $request->input('qty6');
        $data->price6 = $amountWithoutDots6;
        $data->total6 = $total6;
        $data->description6 = $request->input('description6');


        $data->unit7 = $request->input('unit7');
        $data->qty7 = $request->input('qty7');
        $data->price7 = $amountWithoutDots7;
        $data->total7 = $total7;
        $data->description7 = $request->input('description7');


        $data->unit8 = $request->input('unit8');
        $data->qty8 = $request->input('qty8');
        $data->price8 = $amountWithoutDots8;
        $data->total8 = $total8;
        $data->description8 = $request->input('description8');



        $data->jumlah_total = $jumlah_total_akhir;
        $data->norek_id = $request->input('norek_id');
        $data->status = 0;

        $data->no_project = $request->input('no_project');
        $data->j_peserta = $request->input('j_peserta');
        $data->j_traine_asesor = $request->input('j_traine_asesor');
        $data->j_assist = $request->input('j_assist');

        $randomString = Str::random(5);
        // $acak =$username . '_', $username;
        $username = Auth::user()->name;
        $documentdepartement_id = $username . $randomString;


        if ($request->hasFile('image1')) {
            $destination = 'storage/MD/' . $data->image1;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image1');
            $extension = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);
            $filename = 'Lampiran1_' . $temp . '.' . $extension;
            $file->move('storage/MD/', $filename);
            $data->image1 = $filename;
        }

        if ($request->hasFile('image2')) {
            $destination2 = 'storage/MD/' . $data->image2;
            if (File::exists($destination2)) {
                File::delete($destination2);
            }
            $file = $request->file('image2');
            $extension2 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);
            $filename2 = 'Lampiran2_' . $temp   . '.' . $extension2;
            $file->move('storage/MD/', $filename2);
            $data->image2 = $filename2;
        }

        if ($request->hasFile('image3')) {
            $destination3 = 'storage/MD/' . $data->image3;
            if (File::exists($destination3)) {
                File::delete($destination3);
            }
            $file = $request->file('image3');
            $extension3 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);

            $filename3 = 'Lampiran3_' . $temp  . '.' . $extension3;
            $file->move('storage/MD/', $filename3);
            $data->image3 = $filename3;
        }

        if ($request->hasFile('image4')) {
            $destination4 = 'storage/MD/' . $data->image4;
            if (File::exists($destination4)) {
                File::delete($destination4);
            }
            $file = $request->file('image4');
            $extension4 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);
            $filename4 = 'Lampiran4_' . $temp   . '.' . $extension4;
            $file->move('storage/MD/', $filename4);
            $data->image4 = $filename4;
        }

        if ($request->hasFile('image5')) {
            $destination5 = 'storage/MD/' . $data->image5;
            if (File::exists($destination5)) {
                File::delete($destination5);
            }
            $file = $request->file('image5');
            $extension5 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);

            $filename5 = 'Lampiran5_' . $temp  . '.' . $extension5;
            $file->move('storage/MD/', $filename5);
            $data->image5 = $filename5;
        }

        if ($request->hasFile('image6')) {
            $destination6 = 'storage/MD/' . $data->image6;
            if (File::exists($destination6)) {
                File::delete($destination6);
            }
            $file = $request->file('image6');
            $extension6 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);

            $filename6 = 'Lampiran6_' . $temp  . '.' . $extension6;
            $file->move('storage/MD/', $filename6);
            $data->image6 = $filename6;
        }

        if ($request->hasFile('image7')) {
            $destination7 = 'storage/MD/' . $data->image7;
            if (File::exists($destination7)) {
                File::delete($destination7);
            }
            $file = $request->file('image7');
            $extension7 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);

            $filename7 = 'Lampiran7_' . $temp  . '.' . $extension7;
            $file->move('storage/MD/', $filename7);
            $data->image7 = $filename7;
        }

        if ($request->hasFile('image8')) {
            $destination8 = 'storage/MD/' . $data->image8;
            if (File::exists($destination8)) {
                File::delete($destination8);
            }
            $file = $request->file('image8');
            $extension8 = $file->getClientOriginalExtension();
            $temp               = str_replace('/', '_', $documentdepartement_id);
            $filename8 = 'Lampiran8_' . $temp  . '.' . $extension8;
            $file->move('storage/MD/', $filename8);
            $data->image8 = $filename8;
        }

        $data->save();
        return redirect()->route('form.index')->with(
            'success',
            'Success ! Data RF Berhasil di Update'
        );

        // {
        //     // dd($request);
        //     $request->validate([
        //         'qty' => 'required',
        //         'unit' => 'required',
        //         'price' => 'required',
        //         'departement_id' => 'required|numeric',
        //         'kpengajuan_id' => 'required|numeric',
        //         'payment' => ['required', 'in:Cash,Transfer'],
        //         'rujukan_id' => 'required|numeric',
        //         'keperluan_id' => 'required|numeric',
        //     ]);

        //     $data = Form::findOrFail($id);
        //     $userId = auth()->id();
        //     $username = Auth::user()->name;
        //     // dd($request);
        //     $amount = $request->input('price');
        //     $amountWithoutDots = str_replace('.', '', $amount);
        //     $amount2 = $request->price2;
        //     if ($amount2 == NULL) {
        //         $amountWithoutDots2 = NULL;
        //     } else {
        //         $amountWithoutDots2 = str_replace('.', '', $amount2);
        //     }

        //     $amount3 = $request->price3;
        //     if ($amount3 == NULL) {
        //         $amountWithoutDots3 = NULL;
        //     } else {
        //         $amountWithoutDots3 = str_replace('.', '', $amount3);
        //     }


        //     $amount4 = $request->price4;
        //     if ($amount4 == NULL) {
        //         $amountWithoutDots4 = NULL;
        //     } else {
        //         $amountWithoutDots4 = str_replace('.', '', $amount4);
        //     }

        //     $amount5 = $request->price5;
        //     if ($amount5 == NULL) {
        //         $amountWithoutDots5 = NULL;
        //     } else {
        //         $amountWithoutDots5 = str_replace('.', '', $amount5);
        //     }

        //     $amount6 = $request->price6;
        //     if ($amount6 == NULL) {
        //         $amountWithoutDots6 = NULL;
        //     } else {
        //         $amountWithoutDots6 = str_replace('.', '', $amount6);
        //     }

        //     $amount7 = $request->price7;
        //     if ($amount7 == NULL) {
        //         $amountWithoutDots7 = NULL;
        //     } else {
        //         $amountWithoutDots7 = str_replace('.', '', $amount7);
        //     }

        //     $amount8 = $request->price8;
        //     if ($amount8 == NULL) {
        //         $amountWithoutDots8 = NULL;
        //     } else {
        //         $amountWithoutDots8 = str_replace('.', '', $amount8);
        //     }

        //     $total = $request->qty * $amountWithoutDots;
        //     $total2 = $request->qty2 * $amountWithoutDots2;
        //     $total3 = $request->qty3 * $amountWithoutDots3;
        //     $total4 = $request->qty4 * $amountWithoutDots4;
        //     $total5 = $request->qty5 * $amountWithoutDots5;
        //     $total6 = $request->qty6 * $amountWithoutDots6;
        //     $total7 = $request->qty7 * $amountWithoutDots7;
        //     $total8 = $request->qty8 * $amountWithoutDots8;

        //     $jumlah = $total + $total2;
        //     $jumlah2 = $total3 + $total4;
        //     $jumlah3 = $total5 + $total6;
        //     $jumlah4 = $total7 + $total8;
        //     $total_jumlah1 = $jumlah + $jumlah2;
        //     $total_jumlah2 = $jumlah3 + $jumlah4;
        //     $jumlah_akhir = $total_jumlah1 + $total_jumlah2;

        //     $data10 = $request->norek_id;
        //     if ($data10 == NULL) {
        //         $jumlah_total_akhir = $jumlah_akhir + 0;
        //     } else {
        //         $jumlah_total_akhir = $jumlah_akhir + 0;
        //     }

        //     $randomString = Str::random(5);

        //     // $acak =$username . '_', $username;

        //     $documentdepartement_id = $username . $randomString;
        //     $data2 = $request->image11;
        //     if ($data2 == NULL) {
        //         $filename1 = 0;
        //     } else {
        //         if ($request->hasFile('image11')) {
        //             $this->validate($request, [
        //                 'image11'          => 'mimes:jpeg,png,jpg,gif,pdf|max:15048',
        //             ]);
        //             $file               = $request->file('image11');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename1          = 'Lampiran1_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename1);
        //         }
        //     }

        //     $data3 = $request->image12;
        //     if ($data3 == NULL) {
        //         $filename2 = 0;
        //     } else {
        //         if ($request->hasFile('image12')) {
        //             $this->validate($request, [
        //                 'image12'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image12');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename2          = 'Lampiran2_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename2);
        //         }
        //     }
        //     $data4 = $request->image13;
        //     if ($data4 == NULL) {
        //         $filename3 = 0;
        //     } else {
        //         if ($request->hasFile('image13')) {
        //             $this->validate($request, [
        //                 'image13'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image13');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename3          = 'Lampiran3_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename3);
        //         }
        //     }
        //     $data5 = $request->image14;
        //     if ($data5 == NULL) {
        //         $filename4 = 0;
        //     } else {
        //         if ($request->hasFile('image14')) {
        //             $this->validate($request, [
        //                 'image14'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image14');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename4          = 'Lampiran4_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename4);
        //         }
        //     }
        //     $data6 = $request->image15;
        //     if ($data6 == NULL) {
        //         $filename5 = 0;
        //     } else {
        //         if ($request->hasFile('image15')) {
        //             $this->validate($request, [
        //                 'image15'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image15');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename5          = 'Lampiran5_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename5);
        //         }
        //     }
        //     $data7 = $request->image16;
        //     if ($data7 == NULL) {
        //         $filename6 = 0;
        //     } else {
        //         if ($request->hasFile('image16')) {
        //             $this->validate($request, [
        //                 'image16'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image16');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename6         = 'Lampiran6_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename6);
        //         }
        //     }
        //     $data8 = $request->image17;
        //     if ($data8 == NULL) {
        //         $filename7 = 0;
        //     } else {
        //         if ($request->hasFile('image17')) {
        //             $this->validate($request, [
        //                 'image17'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image17');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename7          = 'Lampiran7_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename7);
        //         }
        //     }
        //     $data9 = $request->image18;
        //     if ($data9 == NULL) {
        //         $filename8 = 0;
        //     } else {
        //         if ($request->hasFile('image18')) {
        //             $this->validate($request, [
        //                 'image18'          => 'image1|mimes:jpeg,png,jpg,gif|max:15048',
        //             ]);
        //             $file               = $request->file('image18');
        //             $temp               = str_replace('/', '_', $documentdepartement_id);
        //             $filename8          = 'Lampiran8_' . $temp . '.' . $file->getClientOriginalExtension();
        //             $destinationPath    = 'storage/MD';
        //             $file->move($destinationPath, $filename8);
        //         }
        //     }

        //     // dd($data);
        //     $data->update([
        //         'from_id' => $userId,
        //         'rujukan_id' => $request->rujukan_id,
        //         'kpengajuan_id' => $request->kpengajuan_id,
        //         'keperluan_id' => $request->keperluan_id,
        //         'departement_id' => $request->departement_id,
        //         'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
        //         'payment' => $request->payment,
        //         'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
        //         'unit' => $request->unit,
        //         'qty' => $request->qty,
        //         'price' => $amountWithoutDots,
        //         'total' => $total,
        //         'tanggal_kebutuhan2' => $request->tanggal_kebutuhan2,
        //         'unit2' => $request->unit2,
        //         'qty2' => $request->qty2,
        //         'price2' => $amountWithoutDots2,
        //         'total2' => $total2,
        //         'tanggal_kebutuhan3' => $request->tanggal_kebutuhan3,
        //         'unit3' => $request->unit3,
        //         'qty3' => $request->qty3,
        //         'price3' => $amountWithoutDots3,
        //         'total3' => $total3,
        //         'tanggal_kebutuhan4' => $request->tanggal_kebutuhan4,
        //         'unit4' => $request->unit4,
        //         'qty4' => $request->qty4,
        //         'price4' => $amountWithoutDots4,
        //         'total4' => $total4,
        //         'tanggal_kebutuhan5' => $request->tanggal_kebutuhan5,
        //         'unit5' => $request->unit5,
        //         'qty5' => $request->qty5,
        //         'price5' => $amountWithoutDots5,
        //         'total5' => $total5,
        //         'tanggal_kebutuhan6' => $request->tanggal_kebutuhan6,
        //         'unit6' => $request->unit6,
        //         'qty6' => $request->qty6,
        //         'price6' => $amountWithoutDots6,
        //         'total6' => $total6,
        //         'tanggal_kebutuhan7' => $request->tanggal_kebutuhan7,
        //         'unit7' => $request->unit7,
        //         'qty7' => $request->qty7,
        //         'price7' => $amountWithoutDots7,
        //         'total7' => $total7,
        //         'tanggal_kebutuhan8' => $request->tanggal_kebutuhan8,
        //         'unit8' => $request->unit8,
        //         'qty8' => $request->qty8,
        //         'price8' => $amountWithoutDots8,
        //         'total8' => $total8,
        //         'jumlah_total' => $jumlah_total_akhir,
        //         'norek_id' => $request->norek_id,
        //         // 'file' => $filename,
        //         'image11' => $filename1,
        //         'image12' => $filename2,
        //         'image13' => $filename3,
        //         'image14' => $filename4,
        //         'image15' => $filename5,
        //         'image16' => $filename6,
        //         'image17' => $filename7,
        //         'image18' => $filename8,
        //         'status' => 0,
        //         'no_project'  => $request->no_project,
        //         'j_peserta'  => $request->j_peserta,
        //         'j_traine_asesor'  => $request->j_traine_asesor,
        //         'j_assist'  => $request->j_assist
        //     ]);

        //     // dd($data);
        //     return redirect()->route('form.index')
        //         ->with(
        //             'success',
        //             'Success ! Data RF Berhasil di Update'
        //         );
        // }
    }

    public function print($id)
    {
        $data = Form::find($id);
        // dd($data);
        $pdf = PDF::loadview('pages.form.print', [
            'data' => $data
        ]);
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('Surat-Pengajuan.pdf');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('form.delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $delete = Form::find($id);
        $delete->delete();
        return redirect()->route('form-checked.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Hapus'
            );
    }

    public function list()
    {
        $form = Form::where('status', '4')->get();
        // dd($form);
        return view('pages.form.selesai.index', [
            'form' => $form
        ]);
    }

    public function listAdvance()
    {
        $userId = auth()->id();
        $bank = Bank::get();
        $norek = NoRek::get();
        $advance = Form::where('kpengajuan_id', 'Advance')->get();
        $role = User::where('jabatan_id', $userId)->get();
        $departement = Departement::all();
        // dd($form);
        return view('pages.form.list-advance.index', [
            'advance'   => $advance,
            'role'   => $role,
            'bank'   => $bank,
            'departement' => $departement,
            'norek'   => $norek
        ]);
    }

    public function konfirmasi($id)
    {
        $userId = auth()->id();
        $date = date('y-m-d');
        $data = Form::where('id', $id)->first();
        $data->update(
            [
                "status" => "6",
            ]
        );
        return back()
            ->with('success', 'Congratulation ! Konfirmasi Dana telah berhasil');
    }
    public function konfirmasiRem($id)
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
            ->with('success', 'Congratulation ! Konfirmasi Dana telah berhasil');
    }

    public function detail($id)
    {
        $show = Form::find($id);
        // dd($show);
        return view('pages.form.detail', [
            'show'   => $show
        ]);
    }

    public function kPembayaran(Request $request, $id)
    {
        // dd($request->jumlah_total);
        // dd($request->jumlah_pemakaian);
        $date = date('y-m-d');
        $data = Form::findOrFail($id);

        $amount2 = $request->jumlah_pemakaian;
        if ($amount2 == NULL) {
            $amountWithoutDots2 = NULL;
            // dd($amountWithoutDots2);
        } else {
            $amountWithoutDots2 = str_replace('.', '', $amount2);
            // dd($amountWithoutDots2);
        }


        $total = $request->qty * $request->price;
        $total2 = $request->qty2 * $request->price2;
        $total3 = $request->qty3 * $request->price3;
        $total4 = $request->qty4 * $request->price4;
        $total5 = $request->qty * $request->price5;
        $total6 = $request->qty * $request->price6;
        $total7 = $request->qty * $request->price7;
        $total8 = $request->qty * $request->price8;

        $jumlah_total = $request->jumlah_dana;
        $jumlah_total2 = $amountWithoutDots2;

        // $jumlahpengakaian = $request->$jumlah_pemakaian;

        $totalBalance = $jumlah_total - $jumlah_total2;


        // dd($totalBalance);

        $data->update([
            'from_id' => $request->from_id,
            'rujukan_id' => $request->rujukan_id,
            'kpengajuan_id' => $request->kpengajuan_id,
            'departement_id' => $request->departement_id,
            'keperluan_id' => $request->keperluan_id,
            'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
            'payment' => $request->payment,
            'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
            'unit' => $request->unit,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $total,
            'tanggal_kebutuhan2' => $request->tanggal_kebutuhan2,
            'unit2' => $request->unit2,
            'qty2' => $request->qty2,
            'price2' => $request->price2,
            'total2' => $total2,
            'tanggal_kebutuhan3' => $request->tanggal_kebutuhan3,
            'unit3' => $request->unit3,
            'qty3' => $request->qty3,
            'price3' => $request->price3,
            'total3' => $total3,
            'tanggal_kebutuhan4' => $request->tanggal_kebutuhan4,
            'unit4' => $request->unit4,
            'qty4' => $request->qty4,
            'price4' => $request->price4,
            'total4' => $total4,
            'tanggal_kebutuhan5' => $request->tanggal_kebutuhan5,
            'unit5' => $request->unit5,
            'qty5' => $request->qty5,
            'price5' => $request->price5,
            'total5' => $total5,
            'tanggal_kebutuhan6' => $request->tanggal_kebutuhan6,
            'unit6' => $request->unit6,
            'qty6' => $request->qty6,
            'price6' => $request->price6,
            'total6' => $total6,
            'tanggal_kebutuhan7' => $request->tanggal_kebutuhan7,
            'unit7' => $request->unit7,
            'qty7' => $request->qty7,
            'price7' => $request->price7,
            'total7' => $total7,
            'tanggal_kebutuhan8' => $request->tanggal_kebutuhan8,
            'unit8' => $request->unit8,
            'qty8' => $request->qty8,
            'price8' => $request->price8,
            'total8' => $total8,
            'jumlah_total' => $request->jumlah_total,
            'norek_id' => $request->norek_id,
            'jumlah_dana' => $request->jumlah_dana,
            'tgl_terima_dana' => $request->tgl_terima_dana,
            'tgl_pembayaran'    => $date,
            'balance'  => $totalBalance,
            'jumlah_pemakaian'    => $amountWithoutDots2,
            'status' => 7,

        ]);
        // dd($data);
        return redirect()->route('form.index')
            ->with('success', 'Congratulation !  Data Berhasil Di Process');
    }

    public function download($file)
    {
        $pathToFile = public_path('storage/MD/' . $file);
        return response()->download($pathToFile);
        // return $pathToFile->stream('Surat-Pengajuan.pdf');


    }
}

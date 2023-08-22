<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Form;
use App\Models\User;
use App\Models\NoRek;
use App\Models\Rujukan;
use App\Models\Keperluan;
use App\Models\Kpengajuan;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FapproveController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form-app.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $bank = Bank::get();
        $norek = NoRek::all();
        $kpengajuan = Kpengajuan::all();
        $keperluan = Keperluan::all();
        $rujukan = Rujukan::all();

        // dd($norek);

        $form = Form::where('from_id', $userId)
            ->where('status', '<', 8)
            ->orderBy('created_at', 'desc')
            ->get();

        $role = User::where('jabatan_id', $userId)->get();
        $departement = Departement::all();
        // dd($form);
        return view('pages.f-app.index', [
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
        $userId = auth()->id();
        $username = Auth::user()->name;
        $request->validate([
            'qty' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'departement_id' => 'required|numeric',
            'kpengajuan_id' => 'required|numeric',
            'payment' => 'required',
            'rujukan_id' => 'required|numeric',
            'keperluan_id' => 'required|numeric',
        ]);
        $total = $request->qty * $request->price;
        $total2 = $request->qty2 * $request->price2;
        $total3 = $request->qty3 * $request->price3;
        $total4 = $request->qty4 * $request->price4;
        $total5 = $request->qty * $request->price5;
        $total6 = $request->qty * $request->price6;
        $total7 = $request->qty * $request->price7;
        $total8 = $request->qty * $request->price8;
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

        $documentNumber = $username;
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
            'price' => $request->price,
            'total' => $total,
            'description2' => $request->description2,
            'unit2' => $request->unit2,
            'qty2' => $request->qty2,
            'price2' => $request->price2,
            'total2' => $total2,
            'description3' => $request->description3,
            'unit3' => $request->unit3,
            'qty3' => $request->qty3,
            'price3' => $request->price3,
            'total3' => $total3,
            'description4' => $request->description4,
            'unit4' => $request->unit4,
            'qty4' => $request->qty4,
            'price4' => $request->price4,
            'total4' => $total4,
            'description5' => $request->description5,
            'unit5' => $request->unit5,
            'qty5' => $request->qty5,
            'price5' => $request->price5,
            'total5' => $total5,
            'description6' => $request->description6,
            'unit6' => $request->unit6,
            'qty6' => $request->qty6,
            'price6' => $request->price6,
            'total6' => $total6,
            'description7' => $request->description7,
            'unit7' => $request->unit7,
            'qty7' => $request->qty7,
            'price7' => $request->price7,
            'total7' => $total7,
            'description8' => $request->description8,
            'unit8' => $request->unit8,
            'qty8' => $request->qty8,
            'price8' => $request->price8,
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
            'status' => 4,
            'no_project'  => $request->no_project,
            'j_peserta'  => $request->j_peserta,
            'j_traine_asesor'  => $request->j_traine_asesor,
            'j_assist'  => $request->j_assist
        ]);

        return redirect()->route('form-app.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Tambahkan'
            );
    }

    public function show($id)
    {
        $show = Form::find($id);
        return view('pages.f-app.show', [
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
        $norek = NoRek::get();

        return view('pages.f-app.edit', [
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
            'qty' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'departement_id' => 'required|numeric',
            'kpengajuan_id' => 'required|numeric',
            'payment' => 'required',
            'rujukan_id' => 'required|numeric',
            'keperluan_id' => 'required|numeric',
        ]);
        $data = Form::findOrFail($id);
        $userId = auth()->id();
        $username = Auth::user()->name;
        // dd($request);
        $total = $request->qty * $request->price;
        $total2 = $request->qty2 * $request->price2;
        $total3 = $request->qty3 * $request->price3;
        $total4 = $request->qty4 * $request->price4;
        $total5 = $request->qty * $request->price5;
        $total6 = $request->qty * $request->price6;
        $total7 = $request->qty * $request->price7;
        $total8 = $request->qty * $request->price8;

        $jumlah = $total + $total2;
        $jumlah2 = $total3 + $total4;

        $jumlah3 = $total5 + $total6;
        $jumlah4 = $total7 + $total8;

        $total_jumlah1 = $jumlah + $jumlah2;
        $total_jumlah2 = $jumlah3 + $jumlah4;

        $jumlah_akhir = $total_jumlah1 + $total_jumlah2;
        // dd($jumlah);


        $data2 = $request->norek_id;
        if ($data2 == NULL) {
            $jumlah_total_akhir = $jumlah_akhir + 0;
        } else {
            $jumlah_total_akhir = $jumlah_akhir + 6500;
        };
        // dd($jumlah_total_akhir);
        $documentNumber = $username;
        $data2 = $request->image1;
        if ($data2 == NULL) {
            $filename1 = 0;
        } else {
            if ($request->hasFile('image1')) {
                $this->validate($request, [
                    'image1'          => 'image|mimes:jpeg,png,jpg,gif|max:15048',
                ]);
                $file               = $request->file('image1');
                $temp               = str_replace('/', '_', $documentNumber);
                $filename1          = 'Lampiran1_' . $temp . '.' . $file->getClientOriginalExtension();
                $destinationPath    = 'storage/MD';
                $file->move($destinationPath, $filename1);
            }
        }
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
        $data->update([
            'from_id' => $userId,
            'rujukan_id' => $request->rujukan_id,
            'kpengajuan_id' => $request->kpengajuan_id,
            'departement_id' => $request->departement_id,
            'keperluan_id' => $request->keperluan_id,
            'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
            'payment' => $request->payment,
            'description' => $request->description,
            'unit' => $request->unit,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $total,
            'description2' => $request->description2,
            'unit2' => $request->unit2,
            'qty2' => $request->qty2,
            'price2' => $request->price2,
            'total2' => $total2,
            'description3' => $request->description3,
            'unit3' => $request->unit3,
            'qty3' => $request->qty3,
            'price3' => $request->price3,
            'total3' => $total3,
            'description4' => $request->description4,
            'unit4' => $request->unit4,
            'qty4' => $request->qty4,
            'price4' => $request->price4,
            'total4' => $total4,
            'description5' => $request->description5,
            'unit5' => $request->unit5,
            'qty5' => $request->qty5,
            'price5' => $request->price5,
            'total5' => $total5,
            'description6' => $request->description6,
            'unit6' => $request->unit6,
            'qty6' => $request->qty6,
            'price6' => $request->price6,
            'total6' => $total6,
            'description7' => $request->description7,
            'unit7' => $request->unit7,
            'qty7' => $request->qty7,
            'price7' => $request->price7,
            'total7' => $total7,
            'description8' => $request->description8,
            'unit8' => $request->unit8,
            'qty8' => $request->qty8,
            'price8' => $request->price8,
            'total8' => $total8,
            'jumlah_total' => $jumlah_total_akhir,
            'norek_id' => $request->norek_id,
            'image1' => $filename1,
            'image2' => $filename2,
            'image3' => $filename3,
            'image4' => $filename4,
            'image5' => $filename5,
            'image6' => $filename6,
            'image7' => $filename7,
            'image8' => $filename8,
            'no_project'  => $request->no_project,
            'j_peserta'  => $request->j_peserta,
            'j_traine_asesor'  => $request->j_traine_asesor,
            'j_assist'  => $request->j_assist

        ]);

        // dd($data);
        return redirect()->route('form-app.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Update'
            );
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


    public function destroy($id)
    {
        $delete = Form::find($id);
        $delete->delete();
        return redirect()->route('form-app.index')
            ->with(
                'success',
                'Success ! Data RF Berhasil di Hapus'
            );
    }

    public function detail($id)
    {
        $show = Form::find($id);
        // dd($show);
        return view('pages.f-app.detail', [
            'show'   => $show
        ]);
    }

    public function kPembayaran(Request $request, $id)
    {
        // dd($request->jumlah_total);
        // dd($request->jumlah_pemakaian);
        $date = date('y-m-d');
        $data = Form::findOrFail($id);

        $total = $request->qty * $request->price;
        $total2 = $request->qty2 * $request->price2;
        $total3 = $request->qty3 * $request->price3;
        $total4 = $request->qty4 * $request->price4;
        $total5 = $request->qty * $request->price5;
        $total6 = $request->qty * $request->price6;
        $total7 = $request->qty * $request->price7;
        $total8 = $request->qty * $request->price8;

        $jumlah_total = $request->jumlah_dana;
        $jumlah_total2 = $request->jumlah_pemakaian;

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
            'description' => $request->description,
            'unit' => $request->unit,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $total,
            'description2' => $request->description2,
            'unit2' => $request->unit2,
            'qty2' => $request->qty2,
            'price2' => $request->price2,
            'total2' => $total2,
            'description3' => $request->description3,
            'unit3' => $request->unit3,
            'qty3' => $request->qty3,
            'price3' => $request->price3,
            'total3' => $total3,
            'description4' => $request->description4,
            'unit4' => $request->unit4,
            'qty4' => $request->qty4,
            'price4' => $request->price4,
            'total4' => $total4,
            'description5' => $request->description5,
            'unit5' => $request->unit5,
            'qty5' => $request->qty5,
            'price5' => $request->price5,
            'total5' => $total5,
            'description6' => $request->description6,
            'unit6' => $request->unit6,
            'qty6' => $request->qty6,
            'price6' => $request->price6,
            'total6' => $total6,
            'description7' => $request->description7,
            'unit7' => $request->unit7,
            'qty7' => $request->qty7,
            'price7' => $request->price7,
            'total7' => $total7,
            'description8' => $request->description8,
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
            'jumlah_pemakaian'    => $request->jumlah_pemakaian,
            'status' => 7,

        ]);
        // dd($data);
        return redirect()->route('form-app.index')
            ->with('success', 'Congratulation !  Data Berhasil Di Process');
    }

    public function download($file)
    {
        $pathToFile = public_path('storage/MD/' . $file);
        return response()->download($pathToFile);
        // return $pathToFile->stream('Surat-Pengajuan.pdf');
    }
}
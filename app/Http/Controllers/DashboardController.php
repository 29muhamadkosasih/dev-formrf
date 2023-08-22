<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard.index'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $userId = auth()->id();
        $form = Form::where('from_id', $userId)->get();
        $forms = Form::where('from_id', $userId)->get();
        $currentMonth = date('m');
        $jumlah_total = DB::table('form')
            ->where('from_id', $userId)
            ->get()
            ->sum('jumlah_total');
        $jumlah_total2 = DB::table('form')
            ->where('from_id', $userId)
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->sum('jumlah_total');

        $reports = DB::table('form')
            ->where('from_id', $userId)
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->count();

        $reportss = DB::table('form')
            ->where('from_id', $userId)->get()
            ->count();

        $data = Form::where('from_id', $userId)->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }
        // dd($monthCount);

        $bulann = date('m');

        $namaBulan = '';

        switch ($bulann) {
            case '01':
                $namaBulan = 'January';
                break;
            case '02':
                $namaBulan = 'February';
                break;
            case '03':
                $namaBulan = 'March';
                break;
            case '04':
                $namaBulan = 'April';
                break;
            case '05':
                $namaBulan = 'May';
                break;
            case '06':
                $namaBulan = 'June';
                break;
            case '07':
                $namaBulan = 'July';
                break;
            case '08':
                $namaBulan = 'August';
                break;
            case '09':
                $namaBulan = 'September';
                break;
            case '10':
                $namaBulan = 'October';
                break;
            case '11':
                $namaBulan = 'November';
                break;
            case '12':
                $namaBulan = 'December';
                break;
            default:
                $namaBulan = 'Bulan tidak valid';
                break;
        }

        return view('pages.dashboard.index', [
            'form' => $form,
            'forms' => $forms,
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'namaBulan' => $namaBulan,
            'reports'   => $reports,
            'jumlah_total'   => $jumlah_total,
            'reportss'   => $reportss,
            'jumlah_total2'   => $jumlah_total2,
        ]);
    }

    public function checked()
    {
        abort_if(Gate::denies('dashboard.checked.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $form = Form::all();
        $total = Form::all()->count();
        $currentMonth = date('m');
        $jumlah_total = DB::table('form')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', 2023)
            ->get()
            ->sum('jumlah_total');
        $reports = DB::table('form')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', 2023)
            ->get()
            ->count();
        $data = Form::all()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        // dd($data);
        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $bulann = date('m');

        $namaBulan = '';

        switch ($bulann) {
            case '01':
                $namaBulan = 'January';
                break;
            case '02':
                $namaBulan = 'February';
                break;
            case '03':
                $namaBulan = 'March';
                break;
            case '04':
                $namaBulan = 'April';
                break;
            case '05':
                $namaBulan = 'May';
                break;
            case '06':
                $namaBulan = 'June';
                break;
            case '07':
                $namaBulan = 'July';
                break;
            case '08':
                $namaBulan = 'August';
                break;
            case '09':
                $namaBulan = 'September';
                break;
            case '10':
                $namaBulan = 'October';
                break;
            case '11':
                $namaBulan = 'November';
                break;
            case '12':
                $namaBulan = 'December';
                break;
            default:
                $namaBulan = 'Bulan tidak valid';
                break;
        }

        return view('pages.dashboard.checked.index', [
            'form' => $form,
            'data' => $data,
            'total'   => $total,
            'namaBulan' => $namaBulan,
            'reports'   => $reports,
            'jumlah_total'   => $jumlah_total,
            'monthCount'   => $monthCount,
            'months'   => $months
        ]);
    }

    public function approve()
    {
        abort_if(Gate::denies('dashboard.approve.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $form = Form::where('status', '3')->get();
        $bulan = Form::where('status', '3')->get()->sum('jumlah_total');
        $total = Form::where('status', '3')->get()->count();
        $reports = DB::table('form')
            ->whereYear('created_at', 2023)
            ->get()
            ->count();

        $jumlah_total = DB::table('form')
            ->whereYear('created_at', 2023)
            ->get()
            ->sum('jumlah_total');

        $data = Form::all()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('d');
        });

        // dd($data);
        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $bulann = date('m');

        $namaBulan = '';

        switch ($bulann) {
            case '01':
                $namaBulan = 'January';
                break;
            case '02':
                $namaBulan = 'February';
                break;
            case '03':
                $namaBulan = 'March';
                break;
            case '04':
                $namaBulan = 'April';
                break;
            case '05':
                $namaBulan = 'May';
                break;
            case '06':
                $namaBulan = 'June';
                break;
            case '07':
                $namaBulan = 'July';
                break;
            case '08':
                $namaBulan = 'August';
                break;
            case '09':
                $namaBulan = 'September';
                break;
            case '10':
                $namaBulan = 'October';
                break;
            case '11':
                $namaBulan = 'November';
                break;
            case '12':
                $namaBulan = 'December';
                break;
            default:
                $namaBulan = 'Bulan tidak valid';
                break;
        }

        return view('pages.dashboard.approve.index', [
            'form' => $form,
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'bulan'  => $bulan,
            'total'   => $total,
            'namaBulan' => $namaBulan,
            'reports'   => $reports,
            'jumlah_total'   => $jumlah_total,

        ]);
    }

    public function general()
    {
        abort_if(Gate::denies('dashboard.general.index'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $userId = auth()->id();
        $form = Form::all();
        $bulan = Form::all()->sum('jumlah_total');
        $total = Form::all()->count();
        $currentMonth = date('m');
        $jumlah_total = DB::table('form')->whereYear('created_at', 2023)
            ->sum('jumlah_total');
        $jumlah_total_all = DB::table('form')
            ->sum('jumlah_total');
        $reports = DB::table('form')
            ->whereYear('created_at', 2023)
            ->get()
            ->count();
        // dd($jumlah_total);
        $paid = Form::where('status', '8')->get()->count();
        $process = Form::where('status', '4')->get()->count();
        $cancel = Form::where('status', '3')->get()->count();

        $forms = Form::where('from_id', $userId)->get();
        $data = Form::all()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });


        $jumlah_total = DB::table('form')->get()
            ->sum('jumlah_total');
        $jumlah_total2 = DB::table('form')
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->sum('jumlah_total');

        $reports = DB::table('form')->whereMonth('created_at', $currentMonth)
            ->get()
            ->count();

        $reportss = DB::table('form')->get()->count();

        // dd($data);
        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $bulann = date('m');

        $namaBulan = '';

        switch ($bulann) {
            case '01':
                $namaBulan = 'January';
                break;
            case '02':
                $namaBulan = 'February';
                break;
            case '03':
                $namaBulan = 'March';
                break;
            case '04':
                $namaBulan = 'April';
                break;
            case '05':
                $namaBulan = 'May';
                break;
            case '06':
                $namaBulan = 'June';
                break;
            case '07':
                $namaBulan = 'July';
                break;
            case '08':
                $namaBulan = 'August';
                break;
            case '09':
                $namaBulan = 'September';
                break;
            case '10':
                $namaBulan = 'October';
                break;
            case '11':
                $namaBulan = 'November';
                break;
            case '12':
                $namaBulan = 'December';
                break;
            default:
                $namaBulan = 'Bulan tidak valid';
                break;
        }

        return view('pages.dashboard.general', [
            'form' => $form,
            'forms' => $forms,
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'bulan'  => $bulan,
            'total'   => $total,
            'namaBulan' => $namaBulan,
            'paid'     => $paid,
            'process'   => $process,
            'cancel'    => $cancel,
            'reports'   => $reports,
            'jumlah_total' => $jumlah_total,
            'reportss' => $reportss,
            'jumlah_total2' => $jumlah_total2,
            'jumlah_total_all' => $jumlah_total_all

        ]);
    }
}

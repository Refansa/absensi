<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $absensi = Absensi::where('tanggal', '>', Carbon::today())
            ->where('tanggal', '<', Carbon::tomorrow())
            ->get();

        return view('dashboard', [
            'title'     => 'Dashboard',
            'absensi'   => $absensi,
        ]);
    }
}

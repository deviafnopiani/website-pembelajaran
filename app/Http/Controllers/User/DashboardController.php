<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\ZoomRoom;
use App\Models\InformasiKesehatan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $materis = Materi::latest()->limit(500)->get();
        $zoomRoom = ZoomRoom::where('jadwal', '>=', now())->orderBy('jadwal')->limit(5)->get();
        $infos = InformasiKesehatan::latest()->limit(1000)->get();

        return view('user.dashboard', compact('materis', 'zoomRoom', 'infos'));
    }
}

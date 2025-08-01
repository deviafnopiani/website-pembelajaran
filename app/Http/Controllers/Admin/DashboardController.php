<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Materi;
use App\Models\ZoomRoom;
use App\Models\InformasiKesehatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
{
    $userCount = User::count();
    $materiCount = Materi::count(); 
    $zoomCount = ZoomRoom::count();
    $infoCount = InformasiKesehatan::count();

    return view('admin.dashboard', compact('userCount', 'materiCount', 'zoomCount', 'infoCount'));
}

}

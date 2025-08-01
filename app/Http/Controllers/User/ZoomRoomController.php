<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ZoomRoom;
use Illuminate\Http\Request;

class ZoomRoomController extends Controller
{
    public function index()
    {
        $zoomRooms = ZoomRoom::where('jadwal', '>=', now())
                             ->orderBy('jadwal')
                             ->paginate(50);

        return view('user.zoom-rooms.index', compact('zoomRooms'));
    }

    public function show(ZoomRoom $zoomRoom)
    {
        return view('user.zoom-rooms.show', compact('zoomRoom'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZoomRoom;
use Illuminate\Http\Request;
use App\Services\ZoomService;
use Illuminate\Support\Facades\Auth;

class ZoomRoomController extends Controller
{
    public function index()
    {
        $zoomRooms = ZoomRoom::orderByDesc('jadwal')->paginate(15);
        return view('admin.zoom-rooms.index', compact('zoomRooms'));
    }

    public function create()
    {
        return view('admin.zoom-rooms.create');
    }

    public function store(Request $request, ZoomService $zoom)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'required|date',
        ]);

        $zoomResponse = $zoom->createMeeting([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jadwal' => $request->jadwal,
        ]);

        ZoomRoom::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_meeting' => $zoomResponse['join_url'],
            'jadwal' => $request->jadwal,
            'meeting_id' => $zoomResponse['id'],
            'passcode' => $zoomResponse['password'],
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('admin.zoom-rooms.index')->with('success', 'Zoom meeting berhasil dibuat.');
    }

    public function update(Request $request, ZoomRoom $zoomRoom)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_meeting' => 'required|url',
            'jadwal' => 'required|date',
        ]);
        $zoomRoom->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_meeting' => $request->link_meeting,
            'jadwal' => $request->jadwal,
        ]);


        return redirect()->route('admin.zoom-rooms.index')->with('success', 'Zoom meeting berhasil diperbaharui.');
    }
    public function showAll()
    {
    $zooms = ZoomRoom::orderByDesc('created_at')->get();
    return view('admin.zoom-rooms.show-all', compact('zooms'));
    }

    public function destroy(ZoomRoom $zoomRoom)
    {
        $zoomRoom->delete();
        return redirect()->route('admin.zoom-rooms.index')->with('success', 'Zoom berhasil dihapus.');
    }
    public function edit(ZoomRoom $zoomRoom)
{
    return view('admin.zoom-rooms.edit', compact('zoomRoom'));
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Materi $materi)
    {
        $userId = Auth::id();
        $like = Like::where('materi_id', $materi->id)
            ->where('user_id', $userId)
            ->first();
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'materi_id' => $materi->id,
                'user_id' => $userId,
            ]);
            $liked = true;
        }
        return redirect()->back()->with('status', $liked ? 'You liked this materi.' : 'You unliked this materi.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Feed;
class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::with('user')->orderBy('created_at', 'desc')->get();

        $feedsPerRow = Auth::user()->feeds_per_row ?? 3; // default ke 3 jika tidak ada setelan

        // Kirim data feeds dan feeds_per_row ke view
        return view('feed', compact('feeds', 'feedsPerRow'));
    }

    public function create()
    {
        return view('feed.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,mov|max:153600', // 150 MB dalam kilobytes
            'caption' => 'required|string|max:500', // Batasi panjang caption jika diperlukan
        ]);

        // Upload file ke storage
        $mediaPath = $request->file('media')->store('feed', 'public');
        $mediaType = $request->file('media')->getMimeType();
        $isImage = str_contains($mediaType, 'image');

        // Simpan data ke database
        Feed::create([
            'user_id' => Auth::user()->id,
            'media_path' => $mediaPath,
            'media_type' => $isImage ? 'image' : 'video',
            'caption' => $request->caption,
        ]);

        return redirect()->route('feeds')->with('success', 'Feed berhasil diunggah.');
    }
}

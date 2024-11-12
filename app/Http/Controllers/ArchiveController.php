<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FeedsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ArchiveController extends Controller
{
    //

    public function index(Request $request){
        $feeds = Feed::query();
        if ($request->filled('start_date')) {
            $feeds->where('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $feeds->where('created_at', '<=', $request->end_date);
        }
        $feeds = $feeds->orderBy('created_at', 'desc')->get();

        // Check if the action is 'download'
        if ($request->input('action') === 'download') {
            $format = $request->input('format', 'pdf'); // Default to 'pdf' if not specified
            return $this->downloadArchive($feeds, $format);
        }

        // Check if the request is to download (format is provided)
        // if ($format) {
        //     return $this->downloadArchive($feeds, $format);
        // }
        return view('archive', compact('feeds'));

    }

    public function downloadArchive($feeds, $format)
    {
        if ($format === 'xlsx') {
            return Excel::download(new FeedsExport($feeds), 'archive.xlsx');
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('exports.feeds_pdf', ['feeds' => $feeds]);
            return $pdf->download('archive.pdf');
        }
    }
}

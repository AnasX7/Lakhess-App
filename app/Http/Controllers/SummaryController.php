<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    //
    public function index()
    {
        $summaries = [];

        // Eager load summaries with folders
        $folders = auth()->user()->folders()->with('summaries')->get();

        foreach ($folders as $folder) {
            foreach ($folder->summaries as $summary) {
                $summaries[] = $summary; // Use shorthand for array push
            }
        }

        return view('app.summaries', compact('summaries'));
    }
}

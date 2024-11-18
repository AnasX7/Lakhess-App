<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function index()
    {
        $summaries = [];

        // Eager load summaries with folders
        $folders = auth()->user()->folders()->with('summaries')->get();

        foreach ($folders as $folder) {
            foreach ($folder->summaries as $summary) {
                if ($summary->favorite) { // Assuming favorite is a boolean
                    $summaries[] = $summary; // Use shorthand for array push
                }
            }
        }

        return view('app.favorites', compact('summaries'));
    }

    public function check(string $id)
    {
        $summary = Summary::findOrFail($id);

        $summary->update([
            'favorite' => true
        ]);

        return redirect()->back()->with('success', 'Favorite added!');
    }

    public function uncheck(string $id)
    {
        $summary = Summary::findOrFail($id);

        $summary->update([
            'favorite' => false
        ]);

        return redirect()->back()->with('success', 'Favorite removed!');
    }
}

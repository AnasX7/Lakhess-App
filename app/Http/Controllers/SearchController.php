<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searching(string $search)
    {
        // Initialize arrays to hold the results
        $summaries = [];
        $total_folder_count = [];

        foreach (auth()->user()->folders as $folder) {
            $total_folder_count[$folder->id] = 0;
            foreach ($folder->searchsummaries($search)->get() as $summary) {
                array_push($summaries, $summary);
                $total_folder_count[$folder->id]++;
            }
        }


        // dd($summaries, $quizzes);

        //We will store these in a session since we need to use it on the side-nav
        session()->flash('summaries', $summaries);
        session()->flash('total', $total_folder_count);

        

        return view('app.search', compact('summaries'));
    }
}

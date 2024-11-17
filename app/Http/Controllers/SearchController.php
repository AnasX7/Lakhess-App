<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searching(string $search, string $category = null)
    {
        // Initialize arrays to hold the results
        $summaries = [];
        $quizzes = [];
        $total_folder_count = [];

        switch ($category) {
            case '':
                foreach (auth()->user()->folders as $folder) {
                    $total_folder_count[$folder->id] = 0;
                    $folderSummaries = $folder->searchsummaries($search)->get();
                    foreach ($folderSummaries as $summary) {
                        array_push($summaries, $summary);
                        $quizzesForSummary = $summary->searchQuiz($search)->get();
                        $total_folder_count[$folder->id]++;
                        foreach ($quizzesForSummary as $quiz) {
                            array_push($quizzes, $quiz);
                            $total_folder_count[$folder->id]++;
                        }
                    }
                }
                break;

            case 'summary':
                foreach (auth()->user()->folders as $folder) {
                    $total_folder_count[$folder->id] = 0;
                    foreach ($folder->searchsummaries($search)->get() as $summary) {
                        array_push($summaries, $summary);
                        $total_folder_count[$folder->id]++;
                    }
                }
                break;

            case 'quiz':
                foreach (auth()->user()->folders as $folder) {
                    $total_folder_count[$folder->id] = 0;
                    foreach ($folder->summaries as $summary) {
                        foreach ($summary->searchQuiz($search)->get() as $quiz) {
                            array_push($quizzes, $quiz);
                            $total_folder_count[$folder->id]++;
                        }
                    }
                }
                break;

            default:
                abort(404, 'Category undefined');
                break;
        }


        // dd($summaries, $quizzes);

        //We will store these in a session since we need to use it on the side-nav
        session()->flash('summaries', $summaries);
        session()->flash('quizzes', $quizzes);
        session()->flash('total', $total_folder_count);

        return view('app.search', compact('summaries', 'quizzes', 'category'));
    }
}

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

        switch ($category) {
            case '':
                foreach (auth()->user()->folders as $folder) {
                    $folderSummaries = $folder->searchsummaries($search)->get();
                    foreach ($folderSummaries as $summary) {
                        array_push($summaries, $summary);
                        $quizzesForSummary = $summary->searchQuiz($search)->get();
                        foreach ($quizzesForSummary as $quiz) {
                            array_push($quizzes, $quiz);
                        }
                    }
                }
                break;

            case 'summary':
                foreach (auth()->user()->folders as $folder) {
                    foreach ($folder->searchsummaries($search)->get() as $summary) {
                        array_push($summaries, $summary);
                    }
                }
                break;

            case 'quiz':
                foreach (auth()->user()->folders as $folder) {
                    foreach ($folder->summaries as $summary) {
                        foreach ($summary->searchQuiz($search)->get() as $quiz) {
                            array_push($quizzes, $quiz);
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

        return view('app.search', compact('summaries', 'quizzes', 'category'));
    }
}

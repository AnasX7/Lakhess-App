<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Summary;
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
                //Do both
                $summaryQuery = Summary::query()->where('title', 'LIKE', "%{$search}%");
                $summaries = $summaryQuery->get();

                $quizQuery = Quiz::query()
                    ->where('title', 'LIKE', "%{$search}%");
                $quizzes = $quizQuery->get();
                break;

            case 'summary':
                //do summary
                $summaryQuery = Summary::query()->where('title', 'LIKE', "%{$search}%");
                $summaries = $summaryQuery->get();
                break;

            case 'quiz':
                //do quiz
                $quizQuery = Quiz::query()
                    ->where('title', 'LIKE', "%{$search}%");
                $quizzes = $quizQuery->get();
                break;

            default:
                //we don't want the user to continue with undefined catagory. so we abort
                abort('404', 'category undefiend');
                break;
        }

        //We will store these in a session since we need to use it on the side-nav
        session()->flash('summaries', $summaries);
        session()->flash('quizzes', $quizzes);

        return view('app.search', compact('summaries', 'quizzes', 'category'));
    }
}

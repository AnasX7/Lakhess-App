<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    //
    public function store(Request $request) {

    }

    public function index() {
        return view('app.summaries');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $folders = auth()->user()->folders;

        return view('app.dashboard', compact('folders'));
    }
}

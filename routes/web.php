<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\FavoriteController;
use App\Models\Quiz;
use App\Models\Summary;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'pages.home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/folders', [FolderController::class, 'store'])->name('folders.store');
    Route::get('/folders/{folderId}', [FolderController::class, 'show'])->name('folders.show');

    Route::get('/summaries', [SummaryController::class, 'index'])->name('summaries');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');


    //Search functionality
    Route::get('/search', function () {
        $validated = request()->validate([
            'search' => 'required'
        ]);

        $search = $validated['search'];
        $category = $validated['category'] ?? '';

        return redirect()->route('search.index', compact('search'))->with('category', $category ?? '');
    })->name('search');

    Route::get('/search/{search}/{category?}', [SearchController::class, 'searching'])->name('search.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

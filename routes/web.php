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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'pages.home')->name('home');
Route::view('/features', 'pages.features')->name('features');
Route::view('/FAQ', 'pages.FAQ')->name('FAQ');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/folders', [FolderController::class, 'store'])->name('folders.store');
    Route::get('/folders/{folderId}', [FolderController::class, 'show'])->name('folders.show');
    Route::delete('/folders/{folderId}', [FolderController::class, 'destroy'])->name('folders.destroy');

    Route::get('/summaries', [SummaryController::class, 'index'])->name('summaries');
    Route::get('/summaries/{summaryId}', [SummaryController::class, 'show'])->name('summaries.show');
    Route::post('/summaries/create', [SummaryController::class, 'generate'])->name('summaries.generate');
    Route::get('/summaries/{id}/export', [SummaryController::class, 'export'])->name('summaries.export');

    Route::get('/summaries/{id}/quiz', [SummaryController::class, 'showQuiz'])->name('summaries.showQuiz');
    Route::post('/summaries/{id}/quiz', [SummaryController::class, 'storeQuiz'])->name('summaries.storeQuiz');



    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::get('/favorites/{id}/check', [FavoriteController::class, 'check'])->name('favorites.check');
    Route::get('/favorites/{id}/uncheck', [FavoriteController::class, 'uncheck'])->name('favorites.uncheck');


    //Search functionality
    Route::get('/search', function () {
        $validated = request()->validate([
            'search' => 'required'
        ]);

        $search = $validated['search'];

        return redirect()->route('search.index', compact('search'))->with('category');
    })->name('search');

    Route::get('/search/{search}', [SearchController::class, 'searching'])->name('search.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

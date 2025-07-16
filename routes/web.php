<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\TagController;

// FAQ
Route::get('/', function () {
    $faqs = Faq::with(['category'])->get();
    $categories = Category::orderBy('name')->pluck('name');

    return Inertia::render('Home', [
        'categories' => $categories,
        'faqs'  => $faqs,
        'title' => 'Häufig gestellte Fragen',
        'text'  => 'Willkommen in unserem Hilfebereich! Hier findest du eine Sammlung der häufigsten Fragen und Antworten zu unseren Angeboten und Services. Finden Sie schnell und unkompliziert die Informationen, die Sie suchen.',
    ]);
});

// TAGS
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::middleware('auth')->group(function () {
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

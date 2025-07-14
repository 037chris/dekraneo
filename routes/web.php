<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Faq;

Route::get('/', function () {
    // Hole alle FAQs mit ihrer Kategorie (Tag), sortiert nach Kategorie und Order
    $faqs = Faq::with('tag')
        ->orderBy('tag_id')
        ->get();

    // Gib die FAQs an deine Home-Komponente weiter
    return Inertia::render('Home', [
        'faqs' => $faqs
    ]);
});

Route::get('/tags', function () {
    return Inertia('Tags');
});
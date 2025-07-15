<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Faq;
use App\Models\Category;

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

Route::get('/tags', function () {
    return Inertia('Tags');
});
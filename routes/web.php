<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Faq;

Route::get('/', function () {
    $faqs = Faq::with(['category'])
        ->get();

    return Inertia::render('Home', [
        'faqs'  => $faqs,
        'title' => 'Häufig gestellte Fragen',
        'text'  => 'Willkommen in unserem Hilfebereich! Hier findest du eine Sammlung der häufigsten Fragen und Antworten zu unseren Angeboten und Services. Finden Sie schnell und unkompliziert die Informationen, die Sie suchen.',
    ]);
});

Route::get('/tags', function () {
    return Inertia('Tags');
});
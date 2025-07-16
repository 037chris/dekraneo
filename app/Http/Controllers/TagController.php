<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TagController extends Controller
{


    public function index(Request $request)
    {
        $tags      = Tag::orderBy('name')->paginate(9)->withQueryString();
        $totalTags = Tag::count();

        return Inertia::render('Tags', [
            'tags'      => $tags,
            'totalTags' => $totalTags,
            'title'     => 'Tag Verwaltung',
            'text'      => 'Hier verwalten Sie die Schlagwörter (Tags) für Ihre Inhalte. Erstellen, bearbeiten und organisieren Sie Tags, um die Auffindbarkeit und Kategorisierung Ihrer digitalen Trainings zu optimieren.',
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);
        Tag::create(['name' => $request->name]);
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}

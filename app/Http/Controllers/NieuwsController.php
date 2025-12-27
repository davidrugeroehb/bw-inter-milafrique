<?php

namespace App\Http\Controllers;

use App\Models\Nieuws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class NieuwsController extends Controller
{
    public function index()
    {
        $nieuws = Nieuws::with('tags')->latest('published_at')->take(5)->get();
        return view('home', compact('nieuws'));
    }

    public function admin()
    {
        $nieuws = Nieuws::latest('published_at')->paginate(10);
        return view('admin.nieuws.index', compact('nieuws'));
    }

    public function create()
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.nieuws.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('nieuws', 'public');
        }


        $nieuws = Nieuws::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'published_at' => now(),
        ]);


        if ($request->has('tags')) {
            $nieuws->tags()->attach($request->tags);
        }

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel succesvol toegevoegd!');
    }

    public function show(Nieuws $nieuws)
    {
        //
    }

    public function edit(Nieuws $nieuws)
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.nieuws.edit', compact('nieuws', 'tags'));
    }

    public function update(Request $request, Nieuws $nieuws)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $nieuws->title = $validated['title'];
        $nieuws->content = $validated['content'];

        if ($request->hasFile('image')) {
            if ($nieuws->image) {
                Storage::disk('public')->delete($nieuws->image);
            }

            $nieuws->image = $request->file('image')->store('nieuws', 'public');
        }

        $nieuws->save();


        if ($request->has('tags')) {
            $nieuws->tags()->sync($request->tags);
        } else {
            $nieuws->tags()->detach();
        }

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel succesvol bijgewerkt!');
    }

    public function destroy(Nieuws $nieuws)
    {
        if ($nieuws->image) {
            Storage::disk('public')->delete($nieuws->image);
        }

        $nieuws->delete();

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel verwijderd!');
    }
}

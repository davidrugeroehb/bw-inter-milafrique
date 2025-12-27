<?php

namespace App\Http\Controllers;

use App\Models\Nieuws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NieuwsController extends Controller
{

    public function index()
    {
        $nieuws = Nieuws::latest('published_at')->take(5)->get();
        return view('home', compact('nieuws'));
        $nieuws = Nieuws::with('tags')->latest('published_at')->take(5)->get();
    }
    public function admin()
    {
        $nieuws = Nieuws::latest('published_at')->paginate(10);
        return view('admin.nieuws.index', compact('nieuws'));
    }


    public function create()
    {
        return view('admin.nieuws.create');
    }


    public function store(Request $request)
    {

            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);


            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('nieuws', 'public');
            }


            Nieuws::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'image' => $imagePath,
                'user_id' => auth()->id(),
                'published_at' => now(),
            ]);


            return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel succesvol toegevoegd!');
    }


    public function show(Nieuws $nieuws)
    {
        //
    }


    public function edit(Nieuws $nieuws)
    {
        return view('admin.nieuws.edit', compact('nieuws'));
    }


    public function update(Request $request, Nieuws $nieuws)
    {

            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

            return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel succesvol bijgewerkt!');
    }


    public function destroy(Nieuws $nieuws)
    {

            if ($nieuws->image) {
                Storage::disk('public')->delete($nieuws->image);
            }


            $nieuws->delete();

            return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsartikel succesvol verwijderd!');
    }

}

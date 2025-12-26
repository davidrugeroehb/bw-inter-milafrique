<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'nullable|integer',
        ]);

        Category::create([
            'name' => $validated['name'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol toegevoegd!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'nullable|integer',
        ]);

        $category->update([
            'name' => $validated['name'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol bijgewerkt!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol verwijderd!');
    }
}

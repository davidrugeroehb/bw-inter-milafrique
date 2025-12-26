<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;  // ← DIT IS CRUCIAAL!
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->orderBy('category_id')->orderBy('order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|max:255',
            'answer' => 'required',
            'order' => 'nullable|integer',
        ]);

        Faq::create([
            'category_id' => $validated['category_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ succesvol toegevoegd!');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|max:255',
            'answer' => 'required',
            'order' => 'nullable|integer',
        ]);

        $faq->update([
            'category_id' => $validated['category_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ succesvol bijgewerkt!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ succesvol verwijderd!');
    }
}

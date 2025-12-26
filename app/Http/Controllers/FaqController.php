<?php

namespace App\Http\Controllers;

use App\Models\Category;

class FaqController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->orderBy('order')->get();
        return view('faq', compact('categories'));
    }
}

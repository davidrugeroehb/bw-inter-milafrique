<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|max:255',
            'message' => 'required',
        ]);


        $contact = Contact::create($validated);

        Mail::to('admin@ehb.be')->send(new \App\Mail\ContactMail($contact));




        return redirect()->route('contact')->with('success', 'Bedankt voor je bericht, De vertegenwoordiger zal contact met je nemen.');
    }
}

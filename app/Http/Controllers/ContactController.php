<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:50',
            'service_id' => 'required|exists:services,id',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you! Your message has been sent.');
    }

    public function index()
    {
        $contacts = Contact::with('service')->latest()->paginate(10); // Use paginate for the "Next/Prev" buttons
        $totalQueries = Contact::count();
        $todayLeads = Contact::whereDate('created_at', today())->count();

        return view('dashboard.contact.index', compact('contacts', 'totalQueries', 'todayLeads'));
    }
}

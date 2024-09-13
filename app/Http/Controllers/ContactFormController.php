<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contactData = ContactForm::all();

        return view('contact.create', [
            "contactData" => $contactData
        ]);
    }

    /**
     * Store the submitted form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Create a new contact form submission
        ContactForm::create($validated);

        // Redirect with a success message
        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index(){
        $contacts = Contact::all();
        return view('admin.contacts.contact', compact('contacts'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // dd($validatedData);

        Contact::create($validatedData);




        return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');

    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus');
    }

}

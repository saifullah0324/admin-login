<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('table_search');

        $contacts = Contact::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        })->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts',
            'phone' => 'nullable|string|max:15',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'address' => $request->input('address'),
            'user_id' => Auth::id(), 
        ]);

        
        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id); 
        return view('contacts.edit', compact('contact')); 
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $contact = Contact::findOrFail($id); 
        $contact->update($request->all()); 

        return redirect()->route('contacts.index',)
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id); 
        $contact->delete(); 

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}

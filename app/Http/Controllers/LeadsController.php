<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Contact;
use App\Models\Leads;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function create()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('leads.create', compact('contacts'));
    }

    public function index(Request $request)
    {
        $search = $request->input('table_search'); // Get search query

        $leads = Leads::with('contact')
            ->when($search, function ($query, $search) {
                return $query->whereHas('contact', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10); // Paginate results

        return view('leads.index', compact('leads', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'status' => 'required|in:New,In Progress,Closed',
            'value' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        Leads::create([
            'user_id' => Auth::id(),
            'contact_id' => $request->contact_id,
            'status' => $request->status,
            'value' => $request->value,
            'notes' => $request->notes,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    public function edit($id)
    {
        $lead = Leads::findOrFail($id); // Retrieve the lead or throw 404 if not found
        $contacts = Contact::all(); // Fetch all contacts to populate dropdown
        return view('leads.edit', compact('lead', 'contacts'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'status' => 'required|string',
            'value' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        // Find the lead and update its details
        $lead = Leads::findOrFail($id);
        $lead->update([
            'contact_id' => $request->contact_id,
            'status' => $request->status,
            'value' => $request->value,
            'notes' => $request->notes,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully!');
    }

    public function destroy($id)
    {
        $lead = Leads::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully!');
    }
}

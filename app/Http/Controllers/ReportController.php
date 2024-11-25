<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\Task;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
{
    $searchContact = $request->input('contact_id');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    

    
    $contacts = Contact::all();

   
    $leads = Leads::when($searchContact, function ($query, $searchContact) {
        return $query->where('contact_id', $searchContact);
    })->with('contact') 
      ->paginate(10);

   
    $leadsProgress = Leads::select('status', DB::raw('COUNT(*) as count'))
        ->groupBy('status')
        ->get();

    
    $tasksProgress = Task::select('status', DB::raw('COUNT(*) as count'))
        ->groupBy('status')
        ->get();

        $tasksProgress = DB::table('tasks')
        ->select('status', DB::raw('COUNT(*) as count'))
        ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('due_date', [$startDate, $endDate]);
        })
        ->groupBy('status')
        ->get();

   
    $contactsGrowth = Contact::select(
        DB::raw("DATE_FORMAT(created_at, '%M %Y') as month"),
        DB::raw('COUNT(*) as count')
    )
    ->groupBy('month')
    ->orderBy('created_at', 'asc')
    ->get();

    return view('reports.index', compact('leads', 'contacts', 'leadsProgress', 'tasksProgress', 'contactsGrowth', 'searchContact'), [
        'tasksProgress' => $tasksProgress,
        'startDate' => $startDate,
        'endDate' => $endDate
    ]);

   
}

    
}

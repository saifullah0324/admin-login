<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    // Allow mass assignment on the following fields
    protected $fillable = [
        'user_id',     // The user who owns the lead
        'contact_id',  // The contact associated with the lead
        'status',      // Status of the lead (e.g., New, In Progress, Closed)
        'value',       // Value of the lead (e.g., monetary value)
        'notes',       // Additional notes for the lead
    ];

    // Define the relationship with the User model (assuming you have this)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Contact model
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
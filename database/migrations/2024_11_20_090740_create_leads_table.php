<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user who created it
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade'); // Reference to contact
            $table->enum('status', ['New', 'In Progress', 'Closed'])->default('New'); // Lead status
            $table->decimal('value', 10, 2)->nullable(); // Lead value
            $table->text('notes')->nullable(); // Notes about the lead
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

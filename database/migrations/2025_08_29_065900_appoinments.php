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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('service');
            $table->foreignId('patient_id')->constrained('patient');
            $table->foreignId('attendee_id')->constrained('admin');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->enum('status', ['cancelled','pending', 'appointed', 'resolved'])->default('pending');
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

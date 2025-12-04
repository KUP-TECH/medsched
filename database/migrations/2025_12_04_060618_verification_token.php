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
        Schema::create('verification_token', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patient');
            $table->dateTime('expiration');
        });

        Schema::table('patient', function (Blueprint $table) {
            $table->boolean('is_verified')->default(false);    
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

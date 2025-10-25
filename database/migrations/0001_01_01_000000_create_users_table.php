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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dob');
            $table->enum('gender', ['male','female'])->default('male');
            $table->string('address')->nullable();
            $table->string('contactno')->nullable();
            $table->boolean('is_active')->default(1);
        });



        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('civil', ['single', 'married', 'divorced', 'widowed']);
            $table->string('idno')->nullable();
            $table->string('e_contact')->nullable();
            $table->string('e_number')->nullable();
            $table->string('relationship')->nullable();
            $table->enum('blood_type', ['A+', 'A-', 'B+','B-','AB+', 'AB-', 'O+', 'O-', 'unknown'])->default('unknown');
            $table->json('allergies')->nullable();
            $table->json('medications')->nullable();
            $table->json('previuos_illness')->nullable();
            $table->enum('illness', ['diabetes', 'hypertension', 'heart-disease'])->nullable();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('role')->default('staff');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

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
        Schema::create('patient_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AppointmentID');
            $table->unsignedBigInteger('PatientID');
            $table->string('findings');
            $table->foreign('PatientID')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('AppointmentID')->references('id')->on('patient_appointment')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_history');
    }
};

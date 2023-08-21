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
        Schema::create('patient_appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AssignedToID');
            $table->unsignedBigInteger('PatientID');
            $table->date('AppointmentDate');
            $table->string('Status');
            $table->integer('CreatedByID');
            $table->foreign('AssignedToID')->references('id')->on('person')->onDelete('cascade');
            $table->foreign('PatientID')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('CreatedByID')->references('id')->on('person')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_appointment');
    }
};

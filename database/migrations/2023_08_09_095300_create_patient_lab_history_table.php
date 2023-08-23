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
        Schema::create('patient_lab_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LabID');
            $table->unsignedBigInteger('PatientID');
            $table->unsignedBigInteger('LabDoneByID');
            $table->string('LabResult')->nullable();
            $table->foreign('LabID')->references('id')->on('lab')->onDelete('cascade');
            $table->foreign('PatientID')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('LabDoneByID')->references('id')->on('employee')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_lab_history');
    }
};

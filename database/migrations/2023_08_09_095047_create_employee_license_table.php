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
        Schema::create('employee_license', function (Blueprint $table) {
            $table->id();
            $table->string('LicenseTitle');
            $table->date('LicenseGivenDate');
            $table->date('LicenseExpiryDate');
            $table->string('LicensingOrgan');
            $table->unsignedBigInteger('PersonID');
            $table->integer('CreatedByID')->nullable();
            $table->foreign('PersonID')->references('id')->on('person')->onDelete('cascade');
            $table->foreign('CreatedByID')->references('id')->on('person')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_license');
    }
};

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
        Schema::create('employee_system_privilege', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EmployeeID');
            $table->unsignedBigInteger('SystemPrivilege_ID');
            $table->foreign('EmployeeID')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('SystemPrivilege_ID')->references('id')->on('system_privilege')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_system_privilege');
    }
};

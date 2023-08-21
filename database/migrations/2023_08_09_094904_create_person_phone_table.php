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
        Schema::create('person_phone', function (Blueprint $table) {
            $table->id();
            $table->string('PhoneNumber');
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
        Schema::dropIfExists('person_phone');
    }
};

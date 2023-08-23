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
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PersonTypeID')->nullable();
            $table->string('Title');
            $table->string('FirstName');
            $table->string('FatherName');
            $table->string('LastName');
            $table->date('DOB');
            $table->string('PhotoURL');
            $table->string('Gender');
            $table->integer('CreatedByID')->nullable();
            $table->foreign('PersonTypeID')->references('id')->on('person_type')->onDelete('cascade');
            $table->foreign('CreatedByID')->references('id')->on('person')->onDelete('cascade');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};

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
        Schema::create('person_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RegionID');
            $table->string('ZoneOrSubcity');
            $table->string('Woreda');
            $table->string('Town');
            $table->string('Kebele');
            $table->string('HouseNumber');
            $table->unsignedBigInteger('PersonID');
            $table->integer('CreatedByID');
            $table->foreign('RegionID')->references('id')->on('region')->onDelete('cascade');
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
        Schema::dropIfExists('person_address');
    }
};

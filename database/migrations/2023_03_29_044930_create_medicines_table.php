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
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->integer('quantity');
            $table->string('type', 120);
            $table->double('price');
            $table->unsignedInteger('pharmacy_id')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->timestamps();
        });
    }
};

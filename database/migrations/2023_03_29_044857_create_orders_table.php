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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user_address_id');
            $table->unsignedInteger('doctor_id')->nullable();
            $table->unsignedInteger('pharmacy_id')->nullable(false);
            $table->string('status', 120);
            $table->string('actions', 120);
            $table->string('is_insured');
            $table->string('creator_type', 30);
            $table->double('price')->default(0);
            $table->timestamps();
        });
    }
};

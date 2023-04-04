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
        Schema::create('medicine_order', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('medicine_id');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
};

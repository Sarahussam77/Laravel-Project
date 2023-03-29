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
        Schema::table('order_images', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->nullable(false)->default(1)->change();
        });
    }
};

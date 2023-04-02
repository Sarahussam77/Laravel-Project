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
        Schema::rename('all_users', 'all__users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all__users', function (Blueprint $table) {
            //
        });
    }
};

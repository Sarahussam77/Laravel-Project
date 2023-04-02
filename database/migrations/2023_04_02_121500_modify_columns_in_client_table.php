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
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('password');
            $table->dropColumn('avatar_image');
            $table->dropColumn('national_id');
            $table->dropColumn('email');
            $table->date("date_of_birth");
            $table->tinyInteger('gender');
            $table->string('phone');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client', function (Blueprint $table) {
            //
        });
    }
};

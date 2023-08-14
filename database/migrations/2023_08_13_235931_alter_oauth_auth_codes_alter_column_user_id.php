<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1 drop original column
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        // Step 2 create new column of different data type
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->uuid('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('oauth_auth_codes')->truncate();

        // Step 1 drop original column
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        // Step 2 create new column of different data type
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
    }
};

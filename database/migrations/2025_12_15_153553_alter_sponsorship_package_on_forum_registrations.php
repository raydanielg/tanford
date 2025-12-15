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
        Schema::table('forum_registrations', function (Blueprint $table) {
            // Allow long sponsorship package descriptions from legacy WordPress form
            $table->text('sponsorship_package')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forum_registrations', function (Blueprint $table) {
            // Revert back to string if needed (default length)
            $table->string('sponsorship_package')->change();
        });
    }
};

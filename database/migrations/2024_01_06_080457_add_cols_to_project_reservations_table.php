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
        Schema::table('project_reservations', function (Blueprint $table) {
            $table->string('user_name')->nullable();
            $table->string('user_phone')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_reservations', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('user_phone');
            $table->dropColumn('notes');
        });
    }
};

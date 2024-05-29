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
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('area_id');
            $table->longText('content');
            $table->longText('address');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->double('price' , 8 , 2 );
            $table->string('total_area');
            $table->integer('garage')->nullable();
            $table->integer('basement')->nullable();
            $table->integer('swimming_pool')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1 mean egar 2 means bee3');
            $table->text('youtube_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('area_id');
            $table->dropColumn('content');
            $table->dropColumn('address');
            $table->dropColumn('rooms');
            $table->dropColumn('bathrooms');
            $table->dropColumn('price');
            $table->dropColumn('total_area');
            $table->dropColumn('garage');
            $table->dropColumn('basement');
            $table->dropColumn('swimming_pool');
            $table->dropColumn('type');
            $table->dropColumn('youtube_link');
        });
    }
};

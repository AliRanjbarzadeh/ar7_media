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
	    Schema::create('medium_items', function (Blueprint $table) {
		    $table->id();
		    $table->string('name');
		    $table->unsignedBigInteger('medium_id');
		    $table->morphs('media_item');

		    $table
			    ->foreign('medium_id')
			    ->references('id')
			    ->on('media')
			    ->onDelete('cascade')
			    ->onUpdate('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medium_items');
    }
};

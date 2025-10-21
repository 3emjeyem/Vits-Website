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
         Schema::create('merchandise', function (Blueprint $table) {
            $table->id('ItemID'); 
            $table->string('Name', 50); 
            $table->integer('Stock'); 
            $table->string('Category', 100); 
            $table->dateTime('DateAdded'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise');
    }
};

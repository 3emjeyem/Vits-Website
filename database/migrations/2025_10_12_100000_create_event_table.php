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
        Schema::create('event', function (Blueprint $table) {
            $table->id('EventID'); 
            $table->string('Title', 50); 
            $table->string('EventType', 100); 
            $table->integer('ParticipantLimit')->nullable();
            $table->text('Description'); 
            $table->string('Venue', 50); 
            $table->date('Date'); 
            $table->time('Time');
            $table->string('PosterURL', 100); 
            $table->decimal('Fee', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('event');
    }
};

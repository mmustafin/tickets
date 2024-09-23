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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('qrcode');
            $table->string('area', 100);
            $table->smallInteger('row');
            $table->smallInteger('seat');
            $table->string('status', 15);
            $table->unsignedBigInteger('event_id');
            $table
                ->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

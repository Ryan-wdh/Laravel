<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('leaves_at');
            $table->string('arrives_at');
            $table->integer('ticket_price');
            $table->unsignedBigInteger('festivals_id');
            $table->unsignedBigInteger('user_id');
            $table->string('departure_from');
            $table->string('destination');
            $table->timestamps();
            $table->foreign('festivals_id')->references('id')->on('festivals')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};

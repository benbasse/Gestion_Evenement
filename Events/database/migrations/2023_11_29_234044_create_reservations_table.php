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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            // $table->string('reference')->unique()->default(now().uniqid());
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('evenement_id');
            $table->integer('nombre_place');
            $table->boolean('est_accepter_ou_pas')->default(true);    
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

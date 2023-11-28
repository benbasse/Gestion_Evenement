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
        Schema::create('client_evenement', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->date('date_reservation');
            $table->enum('accepeter', ['oui','non'])->default('non');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('evenement_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_evenement');
    }
};

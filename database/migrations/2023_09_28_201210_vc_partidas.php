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
        Schema::create('vc_partidas', function (Blueprint $table) {
            $table->id();
            $table->date('data_partida1');
            $table->date('data_partida2');
            $table->integer('time1_gols1');
            $table->integer('time2_gols1');
            $table->integer('time1_gols2');
            $table->integer('time2_gols2');
            $table->integer('time1_id');
            $table->integer('time2_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('vc_partidas');
        }
    }
};

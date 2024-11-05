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
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team1_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team2_id')->constrained('teams')->onDelete('cascade');
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('match_players', function (Blueprint $table) {
            $table->id();
            $table->integer('attack_in');
            $table->integer('attack_out');
            $table->integer('block');
            $table->integer('serve_in');
            $table->integer('serve_out');
            $table->integer('dig');
            $table->integer('recieve');
            $table->integer('missed_recieve');
            $table->integer('missed_dig');
            $table->foreignId('match_id')->constrained('match')->onDelete('cascade');
            $table->foreignId('player_id')->constrained('players')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_players');
        Schema::dropIfExists('match');
    }
};

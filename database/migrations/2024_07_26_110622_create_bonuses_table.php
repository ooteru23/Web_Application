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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('month');
            $table->string('year');
            $table->string('ontime');
            $table->string('late');
            $table->string('total_value');
            $table->string('salary_deduction');
            $table->string('component_bonus');
            $table->string('percent_ontime');
            $table->string('total_ontime');
            $table->string('percent_late');
            $table->string('total_late');
            $table->string('percent_bonus_ontime');
            $table->string('total_bonus_ontime');
            $table->string('percent_bonus_late');
            $table->string('total_bonus_late');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};

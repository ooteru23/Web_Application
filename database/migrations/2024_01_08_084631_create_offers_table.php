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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('creator_name');
            $table->string('client_candidate');
            $table->string('address');
            $table->string('date');
            $table->string('valid_date');
            $table->string('pic');
            $table->string('telephone');
            $table->string('service');
            $table->string('period_time');
            $table->string('price');
            $table->string('information');
            $table->string('offer_status')->default('ON PROCESS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

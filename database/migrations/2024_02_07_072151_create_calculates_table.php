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
        Schema::create('calculates', function (Blueprint $table) {
            $table->id();
            $table->string('client_candidate');
            $table->string('year');
            $table->string('contract_value');
            $table->string('commission_price');
            $table->string('software_price');
            $table->string('employee1');
            $table->string('percent1');
            $table->string('employee2');
            $table->string('percent2');
            $table->string('net_value1');
            $table->string('net_value2');
            $table->string('jan');
            $table->string('feb');
            $table->string('mar');
            $table->string('apr');
            $table->string('may');
            $table->string('jun');
            $table->string('jul');
            $table->string('aug');
            $table->string('sep');
            $table->string('oct');
            $table->string('nov');
            $table->string('dec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculates');
    }
};

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
        Schema::create('create_trains', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('train_no');
            $table->string('eng_no');
            $table->string('line');
            $table->string('from');
            $table->string('to');
            $table->string('final_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_trains');
    }
};

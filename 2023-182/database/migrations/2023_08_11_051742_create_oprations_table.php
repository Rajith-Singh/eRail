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
        Schema::create('oprations', function (Blueprint $table) {
            $table->id();
            $table->uuid('index')->nullable(false);
            $table->foreign('index')->references('id')->on('create_trains')->onUpdate('cascade')->onDelete('cascade');   
            $table->string('train_id');
            $table->string('change_point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oprations');
    }
};

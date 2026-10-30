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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('imagen_url');
            $table->string('imagen_public_id'); 
            $table->string('brand');

            $table->unsignedBigInteger('environment_id')->nullable();
            
            $table->foreign('environment_id')
           ->references('id')
           ->on('environments')
           ->onDelete('set null')
           ->onUpdate('set null');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
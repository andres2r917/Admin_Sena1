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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->string('duration');
            $table->string('modality'); 
            $table->string('image')->nullable(); 


            $table->unsignedBigInteger('area_id')->nullable();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('set null')
                ->onUpdate('set null');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
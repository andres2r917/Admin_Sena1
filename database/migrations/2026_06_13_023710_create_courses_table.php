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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_number');
            $table->date('day');


            $table->unsignedBigInteger('training_center_id')->nullable();

           $table->foreign('training_center_id')
           ->references('id')
           ->on('training_centers')
           ->onDelete('set null')
           ->onUpdate('set null');

           $table->unsignedBigInteger('cohort_id')->nullable();

           $table->foreign('cohort_id')
           ->references('id')
           ->on('cohorts')
           ->onDelete('set null')
           ->onUpdate('set null');

            
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
        Schema::dropIfExists('courses');
    }
};
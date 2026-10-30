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
    Schema::create('announcements', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->date('publish_date');
       $table->string('image')->nullable(); 

        $table->unsignedBigInteger('training_center_id')->nullable();

        $table->foreign('training_center_id')
            ->references('id')
            ->on('training_centers')
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
        Schema::dropIfExists('announcements');
    }
};
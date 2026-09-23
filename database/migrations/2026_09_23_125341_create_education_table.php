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
    Schema::create('education', function (Blueprint $table) {
        $table->id();

        $table->string('degree');
        $table->string('institution');

        $table->string('field_of_study')->nullable();

        $table->string('start_year')->nullable();
        $table->string('end_year')->nullable();

        $table->string('location')->nullable();

        $table->text('description')->nullable();

        $table->integer('sort_order')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};

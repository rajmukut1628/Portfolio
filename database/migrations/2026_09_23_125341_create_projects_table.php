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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();

        $table->string('title');

        $table->text('description')->nullable();

        $table->string('image')->nullable();

        $table->string('technologies')->nullable();

        $table->string('github_url')->nullable();

        $table->string('live_url')->nullable();

        $table->boolean('featured')->default(false);

        $table->integer('sort_order')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

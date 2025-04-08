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
       
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Temporary column
            $table->unsignedBigInteger('restaurant_id')->nullable(); // Review for restaurant
            $table->unsignedBigInteger('menu_item_id')->nullable(); // Review for menu item
            $table->integer('rating')->default(1); // Rating out of 5
            $table->text('comment')->nullable();
            $table->timestamps();
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

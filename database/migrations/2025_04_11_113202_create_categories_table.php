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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // auto-incrementing id field
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade'); // Foreign key to the restaurant table
            $table->string('name'); // Category name (e.g., "Starters")
            $table->string('slug')->unique(); // Slug for URL usage
            $table->text('description')->nullable(); // Optional description for the category
            $table->string('image')->nullable(); // Optional image for the category
            $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive
            $table->integer('sort_order')->default(0); // Sorting order for display
            $table->boolean('is_featured')->default(0); // Mark category as featured (1 = Yes, 0 = No)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

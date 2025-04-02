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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Page Title');
            $table->string('subtitle')->nullable()->comment('Page Subtitle');
            $table->string('slug')->unique()->comment('Unique Page Slug');
            $table->text('short_description')->nullable()->comment('Short Description');
            $table->longText('description')->nullable()->comment('Page Content');
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->string('template')->nullable()->comment('Custom Page Template');
            $table->string('image')->nullable()->comment('Page Featured Image');
            $table->string('meta_title')->nullable()->comment('SEO Meta Title');
            $table->text('meta_description')->nullable()->comment('SEO Meta Description');
            $table->string('meta_keyword')->nullable()->comment('SEO Meta Keywords');
            $table->boolean('is_deleted')->default(0)->comment('1=Soft Deleted');
            $table->softDeletes(); // Adds deleted_at column for soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

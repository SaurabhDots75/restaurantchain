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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent')->nullable()->comment('Parent menu ID');
            $table->string('title')->comment('Menu title');
            $table->string('slug')->unique()->comment('Unique menu slug');
            $table->string('icon')->nullable()->comment('Menu icon (optional)');
            $table->string('target')->default('_self')->comment('Target: _self, _blank, etc.');
            $table->string('tooltip')->nullable()->comment('Tooltip for menu item');
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->timestamps();
            $table->foreign('parent')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

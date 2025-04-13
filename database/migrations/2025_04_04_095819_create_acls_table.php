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
        Schema::create('acls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0); // 0 means it's a parent menu
            $table->integer('order')->default(0);
            $table->string('permission_name')->nullable(); // optional single permission for top-level action
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acls');
    }
};

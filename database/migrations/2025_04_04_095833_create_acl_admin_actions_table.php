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
        Schema::create('acl_admin_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_module_id'); // foreign key to acls.id
            $table->string('name'); // Display name like "List Users"
            $table->string('function_name'); // Permission name like "user-list"
            $table->timestamps();
        
            $table->foreign('admin_module_id')->references('id')->on('acls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acl_admin_actions');
    }
};

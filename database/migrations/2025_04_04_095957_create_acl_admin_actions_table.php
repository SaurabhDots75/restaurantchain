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
        // Schema::create('acl_admin_actions', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('admin_module_id'); // FK to acls table
        //     $table->string('name'); // Human-readable permission title (e.g., "Create User")
        //     $table->string('function_name'); // Actual permission name (e.g., "user-create")
        //     $table->timestamps();

        //     $table->foreign('admin_module_id')->references('id')->on('acls')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('acl_admin_actions');
    }
};

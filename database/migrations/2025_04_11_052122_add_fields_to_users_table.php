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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('role')->nullable()->after('phone');
            $table->dateTime('last_login_at')->nullable()->after('role');
            $table->string('profile_image')->nullable()->after('last_login_at');
            $table->text('address')->nullable()->after('profile_image');
            $table->boolean('is_active')->default(1)->after('profile_image');
            $table->boolean('is_deleted')->default(0)->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'role',
                'last_login_at',
                'profile_image',
                'is_active',
                'is_deleted',
            ]);
        });
    }
};

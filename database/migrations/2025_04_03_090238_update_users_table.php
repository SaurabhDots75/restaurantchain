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
          
            if (!Schema::hasColumn('users', 'two_factor_secret')) {
                $table->string('two_factor_secret')->nullable()->after('password'); // Adding MFA secret
            }
            if (!Schema::hasColumn('users', 'restaurant_id')) {
                $table->unsignedBigInteger('restaurant_id')->nullable()->after('two_factor_secret'); // Temporary column, no foreign key
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('users', 'two_factor_secret')) {
                $table->dropColumn('two_factor_secret');
            }
            if (Schema::hasColumn('users', 'restaurant_id')) {
                $table->dropColumn('restaurant_id'); // Dropping the column if rolled back
            }
        });
    }
};

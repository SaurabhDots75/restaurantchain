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
        Schema::table('restaurants', function (Blueprint $table) {
            // Add new columns
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('zip_code')->nullable()->after('country');
            $table->string('logo')->nullable()->after('is_active');
            $table->string('cover_image')->nullable()->after('logo');
            $table->text('description')->nullable()->after('cover_image');
            $table->time('opening_time')->nullable()->after('description');
            $table->time('closing_time')->nullable()->after('opening_time');
            $table->string('registration_number')->nullable()->after('closing_time');
            $table->string('website_url')->nullable()->after('registration_number');
            $table->boolean('delivery_enabled')->default(false)->after('website_url');
            $table->boolean('dine_in_enabled')->default(false)->after('delivery_enabled');
            $table->boolean('pickup_enabled')->default(false)->after('dine_in_enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn([
                'user_id', 'city', 'state', 'country', 'zip_code', 'logo', 
                'cover_image', 'description', 'opening_time', 'closing_time', 
                'registration_number', 'website_url', 'delivery_enabled', 
                'dine_in_enabled', 'pickup_enabled',
            ]);
        });
    }
};

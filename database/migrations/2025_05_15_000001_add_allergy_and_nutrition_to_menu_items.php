<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllergyAndNutritionToMenuItems extends Migration
{
    public function up()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->json('allergies')->nullable();
            $table->json('nutritional_info')->nullable()->after('allergies');
            $table->boolean('is_available')->default(true)->after('nutritional_info');
        });
    }

    public function down()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn(['allergies', 'nutritional_info', 'is_available']);
        });
    }
}
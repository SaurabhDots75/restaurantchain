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
 

        // Payments table
        // if (Schema::hasColumn('payments', 'order_id')) {
        //     Schema::table('payments', function (Blueprint $table) {
        //         $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        //     });
        // }

        // Reviews table
        // Schema::table('reviews', function (Blueprint $table) {
        //     if (Schema::hasColumn('reviews', 'user_id')) {
        //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     }
        //     if (Schema::hasColumn('reviews', 'restaurant_id')) {
        //         $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        //     }
        //     if (Schema::hasColumn('reviews', 'menu_item_id')) {
        //         $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        //     }
        // });

        // Users table
        // if (Schema::hasColumn('users', 'restaurant_id')) {
        //     Schema::table('users', function (Blueprint $table) {
        //         $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        //     });
        // }

     

        // Orders table
        // Schema::table('orders', function (Blueprint $table) {
        //     if (Schema::hasColumn('orders', 'restaurant_id')) {
        //         $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        //     }
        //     if (Schema::hasColumn('orders', 'user_id')) {
        //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     }
        // });

        // Order Items table
        // Schema::table('order_items', function (Blueprint $table) {
        //     if (Schema::hasColumn('order_items', 'order_id')) {
        //         $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        //     }
        //     if (Schema::hasColumn('order_items', 'menu_item_id')) {
        //         $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        //     }
        // });

        // Order Statuses table
        // if (Schema::hasColumn('order_statuses', 'order_id')) {
        //     Schema::table('order_statuses', function (Blueprint $table) {
        //         $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['menu_item_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
        });

        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['menu_item_id']);
        });

        Schema::table('order_statuses', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
    }
};

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
        Schema::table('orders', function (Blueprint $table) {
            // Add new columns
            $table->enum('order_type', ['dine-in', 'delivery', 'pickup'])->default('dine-in')->after('status');
            $table->enum('source', ['manual', 'qr', 'opentable', 'deliveroo'])->default('manual')->after('order_type');
            $table->string('table_number')->nullable()->after('source');
            $table->decimal('wallet_redeemed', 10, 2)->default(0)->after('total_price');
            $table->text('notes')->nullable()->after('table_number');
            $table->string('delivery_address')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'order_type',
                'source',
                'table_number',
                'wallet_redeemed',
                'notes',
                'delivery_address',
            ]);
        });
    }
};

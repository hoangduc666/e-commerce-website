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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity_in_stock')->default(0); // Số lượng tồn kho
            $table->integer('quantity_sold')->default(0);  // Số lượng đã bán
            $table->boolean('is_active')->default(1)->comment('1: active, 0: inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity_in_stock');
            $table->dropColumn('quantity_sold');
            $table->dropColumn('is_active');
        });
    }
};

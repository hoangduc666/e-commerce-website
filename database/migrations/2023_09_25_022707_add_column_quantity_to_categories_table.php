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
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('quantity_in_stock')->default(0);
            $table->integer('quantity_sold')->default(0);
            $table->integer('quantity')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('quantity_in_stock');
            $table->dropColumn('quantity_sold');
            $table->dropColumn('quantity');
        });
    }
};

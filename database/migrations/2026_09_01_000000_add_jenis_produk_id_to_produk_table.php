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
        if (! Schema::hasTable('produk')) {
            return;
        }

        Schema::table('produk', function (Blueprint $table) {
            // Add as nullable to avoid breaking existing rows; you can make it non-nullable later
            $table->foreignId('jenis_produk_id')->nullable()->constrained('jenis_produks')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('produk')) {
            return;
        }

        Schema::table('produk', function (Blueprint $table) {
            if (Schema::hasColumn('produk', 'jenis_produk_id')) {
                $table->dropConstrainedForeignId('jenis_produk_id');
            }
        });
    }
};

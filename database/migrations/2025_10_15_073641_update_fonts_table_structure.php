<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fonts', function (Blueprint $table) {
            // Xóa các cột cũ không dùng
            if (Schema::hasColumn('fonts', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('fonts', 'postscript_name')) {
                $table->dropColumn('postscript_name');
            }

            // Thêm các cột mới nếu chưa có
            if (!Schema::hasColumn('fonts', 'family_name')) {
                $table->string('family_name', 150)->after('status');
            }
            if (!Schema::hasColumn('fonts', 'subfamily')) {
                $table->string('subfamily', 150)->nullable()->after('family_name');
            }
            if (!Schema::hasColumn('fonts', 'weight')) {
                $table->integer('weight')->nullable()->after('subfamily');
            }
            if (!Schema::hasColumn('fonts', 'style')) {
                $table->string('style', 50)->nullable()->after('weight');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fonts', function (Blueprint $table) {
            $table->string('name', 150)->nullable();
            $table->string('postscript_name', 255)->nullable();
            $table->dropColumn(['family_name', 'subfamily', 'weight', 'style']);
        });
    }
};

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
        // Add Role and LastLoginDate if they don't already exist
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'Role')) {
                    $table->enum('Role', ['User', 'Admin', 'Super Admin'])->default('User')->after('password');
                }
                if (!Schema::hasColumn('users', 'LastLoginDate')) {
                    $table->dateTime('LastLoginDate')->nullable()->after('Role');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'LastLoginDate')) {
                    $table->dropColumn('LastLoginDate');
                }
                if (Schema::hasColumn('users', 'Role')) {
                    $table->dropColumn('Role');
                }
            });
        }
    }
};

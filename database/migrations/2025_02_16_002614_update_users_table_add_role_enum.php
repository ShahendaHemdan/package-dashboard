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
            if (Schema::hasColumn('users', 'role_id')) {
                $table->dropForeign(['role_id']); 
                $table->dropColumn('role_id'); 
            }

            $table->enum('role', ['admin', 'super-admin', 'user'])->default('user')->after('mobile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the enum role column
            $table->dropColumn('role');

            // Re-add the role_id column and foreign key (if needed)
            $table->unsignedBigInteger('role_id')->nullable()->after('mobile');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }
};
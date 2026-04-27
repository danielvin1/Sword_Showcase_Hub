<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        // Skip entirely if the columns don't exist (fresh database)
        if (!Schema::hasColumn('users', 'provider_name') && !Schema::hasColumn('users', 'provider_id')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) use ($driver) {
            // SQLite rebuilds the table when dropping columns, so explicitly
            // dropping a missing composite index can fail on fresh Azure deploys.
            if ($driver !== 'sqlite') {
                $table->dropUnique(['provider_name', 'provider_id']);
            }

            // Drop the columns if they exist
            if (Schema::hasColumn('users', 'provider_name')) {
                $table->dropColumn(['provider_name']);
            }
            if (Schema::hasColumn('users', 'provider_id')) {
                $table->dropColumn(['provider_id']);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider_name')->nullable()->index()->after('banner_photo');
            $table->string('provider_id')->nullable()->index()->after('provider_name');
            try {
                $table->unique(['provider_name', 'provider_id']);
            } catch (\Throwable $e) {
                // Ignore duplicate index creation during SQLite rebuilds.
            }
        });
    }
};

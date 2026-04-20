<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'provider_name')) {
                $table->dropIndex(['provider_name']);
            }
            if (Schema::hasColumn('users', 'provider_id')) {
                $table->dropIndex(['provider_id']);
            }
            if (Schema::hasColumn('users', 'provider_name') && Schema::hasColumn('users', 'provider_id')) {
                $table->dropUnique(['provider_name', 'provider_id']);
            }
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
            $table->unique(['provider_name', 'provider_id']);
        });
    }
};
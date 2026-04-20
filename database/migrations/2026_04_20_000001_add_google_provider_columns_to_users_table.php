<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'provider_name')) {
                $table->string('provider_name')->nullable()->index()->after('banner_photo');
            }

            if (! Schema::hasColumn('users', 'provider_id')) {
                $table->string('provider_id')->nullable()->index()->after('provider_name');
            }

            $table->unique(['provider_name', 'provider_id']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['provider_name', 'provider_id']);
            $table->dropIndex(['provider_name']);
            $table->dropIndex(['provider_id']);
            $table->dropColumn(['provider_name', 'provider_id']);
        });
    }
};

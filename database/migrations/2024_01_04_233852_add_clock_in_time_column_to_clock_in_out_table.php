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
        Schema::table('clock_in_out', function (Blueprint $table) {
            //
            $table->timestamp('clock_in_time')->nullable()->after('remark');
            $table->timestamp('clock_out_time')->nullable()->after('clock_in_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clock_in_out', function (Blueprint $table) {
            //
            $table->dropColumn('clock_in_time');
            $table->dropColumn('clock_out_time');

        });
    }
};

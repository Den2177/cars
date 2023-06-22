<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('statuses')->insert([
            'id' => 1,
            'name' => 'planned',
        ]);
        DB::table('statuses')->insert([
            'id' => 2,
            'name' => 'process',
        ]);
        DB::table('statuses')->insert([
            'id' => 3,
            'name' => 'expired',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};

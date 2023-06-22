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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'first_name' => 'Динислам',
            'last_name' => 'Закиров',
            'middle_name' => 'Хайдарович',
            'birth_date' => '2004-05-13',
            'phone' => '89674619075',
            'password' => 'admin',
            'role' => 'admin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

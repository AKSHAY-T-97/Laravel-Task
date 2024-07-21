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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('fk_department')->constrained('departments');
            $table->foreignId('fk_designation')->constrained('designations');
            $table->string('phone_number')->unique();
            $table->timestamp('created_at')->useCurrent();
        });
        DB::table('users')->insert([
            ['name' => 'John Doe', 'fk_department' => 1, 'fk_designation' => 1, 'phone_number' => '1234567890', 'created_at' => now()],
            ['name' => 'Tommy Mark', 'fk_department' => 2, 'fk_designation' => 2, 'phone_number' => '1111111111', 'created_at' => now()],
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

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
        Schema::create('crew', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_id')->nullable()->constrained('ships')->nullOnDelete();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->enum('role', [
                'Captain', 'Chief Officer', 'Able Seaman', 'Ordinary Seaman', 'Engine Cadet',
                'Radio Officer', 'Chief Cook', 'Steward', 'Deckhand'
            ])->default('Ordinary Seaman');
            $table->string('phone_number', 30)->unique();
            $table->string('nationality', 100)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crew');
    }
};

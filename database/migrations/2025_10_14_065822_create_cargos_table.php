<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo_name', 150);
            $table->string('tracking_number', 100)->unique();
            $table->decimal('weight', 10, 2);
            $table->string('origin_port', 150);
            $table->string('destination_port', 150);
            $table->enum('status', ['Pending', 'In Transit', 'Delivered'])->default('Pending');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};

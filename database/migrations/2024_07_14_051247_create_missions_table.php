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
        Schema::create('missions', function (Blueprint $table) {
            $table->id("missions_id"); // Auto-incrementing primary key 'id'
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->enum('state', ['đang thực hiện', 'đã hoàn thành', 'bị hủy'])->default('đang thực hiện');
            $table->string('person_responsibility')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};

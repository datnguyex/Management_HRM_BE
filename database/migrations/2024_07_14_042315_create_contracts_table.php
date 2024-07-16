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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('contract_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('contract_type', ['hợp đồng lao động', 'hợp đồng thử việc', 'hợp đồng dự án']);
            $table->enum('contract_status', ['đang hiệu lực', 'đã kết thúc', 'hợp đồng bị hủy']);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};

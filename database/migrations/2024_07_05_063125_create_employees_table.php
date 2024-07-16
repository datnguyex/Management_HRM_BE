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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("fullname", 1000);
            $table->string("nickname", 1000);
            $table->longtext("img");
            $table->string("address", 1000);
            $table->string("phone", 1000);
            $table->enum("sex", ['male', 'female', 'other']);
            $table->enum("marital_status", ['single', 'married', 'other']);
            $table->date("dob");
            $table->string("email");
            $table->date("start_date");
            $table->date("finish_date");
            $table->enum('type', ["intern", "junior", "senior"]);
            $table->enum('position', ['ceo', 'employee']);
            $table->enum('state_work', ['new', 'old']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

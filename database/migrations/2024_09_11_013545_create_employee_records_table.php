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
        Schema::create('employee_records', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_number');
            $table->string('offense_type');
            $table->date('offense_date');
            $table->text('description');
            $table->text('follow_up_description')->nullable();
            $table->timestamps();
            $table->foreign('id_number')->references('id_number')->on('employees');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_records');
    }
};

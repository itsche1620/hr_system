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
        Schema::create('family_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_number');
            $table->string('mate_name');
            $table->string('child_name')->nullable();
            $table->date('wedding_date');
            $table->string('marriage_certificate_number');
            $table->timestamps();
            $table->foreign('id_number')->references('id_number')->on('employees');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_data', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};

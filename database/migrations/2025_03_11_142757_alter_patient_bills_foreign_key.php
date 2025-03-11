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
        Schema::table('patient_bills', function (Blueprint $table) {
            $table->dropForeign(['treatment_id']); 
            $table->foreign('treatment_id')
                  ->references('id')
                  ->on('treatments')
                  ->onDelete('cascade') // Automatically delete related patient bills
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_bills', function (Blueprint $table) {
            //
        });
    }
};

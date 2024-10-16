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
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropForeign(['patient_id']); 
            $table->dropColumn('patient_id');
        });
        Schema::table('treatments', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id')->nullable()->after('doctor_id'); // Add the doctor_id column again and make it nullable if you want to allow disassociation
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('set null')
                  ->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            //
        });
    }
};

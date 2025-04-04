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

            $table->dropColumn('additional_charges');
        });
        Schema::table('patient_bills', function (Blueprint $table) {
            $table->double('additional_charges')
                ->comment('any test')->nullable()->after('doctor_fees');

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

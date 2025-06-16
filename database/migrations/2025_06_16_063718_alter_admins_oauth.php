
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
        Schema::table('admins', function (Blueprint $table) {
          
           $table->string('password')->nullable()->change();
           $table->string('github_id')->after('password')->nullable();
           $table->string('github_token')->after('github_id')->nullable();
           $table->string('github_refresh_token')->after('github_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();

            $table->dropColumn(['github_id', 'github_token', 'github_refresh_token']);
        });
    }
};


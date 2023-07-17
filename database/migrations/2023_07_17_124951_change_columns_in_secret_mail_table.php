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
        Schema::table('secret_mail', function (Blueprint $table) {
            
            $table->string('text', 10000)->nullable()->change();
            $table->string('problem', 2000)->nullable();
            $table->string('feeling', 2000)->nullable();
            $table->string('thoughts', 2000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('secret_mail', function (Blueprint $table) {
            //
        });
    }
};

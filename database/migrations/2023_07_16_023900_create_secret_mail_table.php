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
        Schema::create('secret_mail', function (Blueprint $table) {
            $table->id();
            $table->string('text', 10000);
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('parent_mail_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('parent_mail_id')->references('id')->on('secret_mail')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secret_mail');
    }
};

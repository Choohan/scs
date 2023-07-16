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
        Schema::create('assignees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peer_id');
            $table->unsignedBigInteger('mail_id');
            $table->foreign('peer_id')->references('id')->on('users');
            $table->foreign('mail_id')->references('id')->on('secret_mail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignees');
    }
};

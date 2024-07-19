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
        Schema::create('followings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('owner');
            $table->foreign('owner')
                ->references('user')
                ->on('id');

            $table->bigInteger('following');
            $table->foreign('owner')
                ->references('user')
                ->on('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followings');
    }
};

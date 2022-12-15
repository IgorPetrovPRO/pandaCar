<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('brief');
            $table->string('chat_id',255);
            $table->tinyInteger('status')->default(0);
            $table->json('data')->nullable();
            $table->integer('position')->default(1);
            $table->integer('statistic_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('answers');
        }
    }
};

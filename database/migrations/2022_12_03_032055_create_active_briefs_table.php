<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('active_briefs', function (Blueprint $table) {
            $table->id();
            $table->string('chat_id');
            $table->integer('brief')->default(1);


            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('active_briefs');
        }
    }
};

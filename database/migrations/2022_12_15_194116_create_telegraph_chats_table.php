<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
return new class () extends Migration {
    use SoftDeletes;
    public function up(): void
    {
        Schema::create('telegraph_chats', function (Blueprint $table) {
            $table->id();
            $table->string('chat_id');
            $table->string('name')->nullable();

            $table->foreignId('telegraph_bot_id')->constrained('telegraph_bots')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['chat_id', 'telegraph_bot_id']);
        });
    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('telegraph_chats');
        }
    }
};

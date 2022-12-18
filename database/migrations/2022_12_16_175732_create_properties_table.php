<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
return new class extends Migration {
    use SoftDeletes;
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->nullable();
            $table->tinyInteger('type');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('properties');
        }
    }
};

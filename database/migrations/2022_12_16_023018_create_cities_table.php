<?php

use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration {
    use SoftDeletes;
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('additional_cost')->default(0);
            $table->foreignIdFor(Country::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('cities');
        }
    }
};

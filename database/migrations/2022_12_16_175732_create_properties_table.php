<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Property;
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
            $table->tinyInteger('type');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('country_property', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(Property::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('value');
        });

    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('properties');
        }
    }
};

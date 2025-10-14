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
        Schema::create('package_activities', function (Blueprint $table) {
            $table->id();
            $table->string('priceprefix')->nullable();
            $table->string('priceper')->nullable();
            $table->string('duration')->nullable();
            $table->longText('durationinfo')->nullable();
            $table->string('type')->nullable();
            $table->longText('typeinfo')->nullable();
            $table->string('size')->nullable();
            $table->longText('sizeinfo')->nullable();
            $table->string('transportation')->nullable();
            $table->longText('transportationinfo')->nullable();
            $table->string('activity')->nullable();
            $table->longText('activityinfo')->nullable();
            $table->string('season')->nullable();
            $table->longText('seasoninfo')->nullable();
            $table->string('accomod')->nullable();
            $table->longText('accomodinfo')->nullable();
            $table->string('meal')->nullable();
            $table->longText('mealinfo')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_activities');
    }
};

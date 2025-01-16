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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->enum('pricing_type', ['fixed', 'hourly', 'per_person', 'custom'])->default('fixed');            $table->decimal('base_price', 10, 2);
            $table->json('price_variations')->comment('For different durations/group sizes')->nullable(); // For different durations/group sizes
            $table->integer('duration')->comment('in minutes')->nullable();
            $table->string('category');
            $table->json('included_items')->nullable();
            $table->json('requirements')->nullable();
            $table->integer('capacity')->nullable()->comment('max people per session');
            $table->boolean('booking_required')->default(true);
            $table->integer('advance_booking_days')->default(0);
            $table->json('available_days')->nullable();
            $table->json('available_times')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('availability')->default(true);
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

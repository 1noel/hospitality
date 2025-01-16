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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category'); // main course, appetizer, dessert, beverage
            $table->json('ingredients')->nullable();
            $table->json('nutritional_info')->nullable();
            $table->boolean('spicy')->default(false);
            $table->boolean('vegetarian')->default(false);
            $table->boolean('vegan')->default(false);
            $table->boolean('gluten_free')->default(false);
            $table->integer('preparation_time')->comment('in minutes');
            $table->boolean('available_for_delivery')->default(true);
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
        Schema::dropIfExists('menu_items');
    }
};

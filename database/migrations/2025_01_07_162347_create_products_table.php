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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('sku')->unique();
            $table->integer('stock_quantity')->default(0);
            $table->string('brand')->nullable();
            $table->string('category');
            $table->json('specifications')->nullable();
            $table->json('variants')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('products');
    }
};

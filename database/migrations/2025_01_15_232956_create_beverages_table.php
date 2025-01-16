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
        Schema::create('beverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category'); // soft drinks, cocktails, wine, beer
            $table->integer('volume')->comment('in ml');
            $table->decimal('alcohol_content', 4, 2)->nullable();
            $table->json('ingredients')->nullable();
            $table->boolean('hot')->default(false);
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
        Schema::dropIfExists('beverages');
    }
};

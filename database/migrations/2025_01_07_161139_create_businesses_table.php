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
            Schema::create('businesses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('restrict');
                $table->string('name');
                $table->text('description');
                $table->string('location');
                $table->string('logo');
                $table->string('photo');
                $table->string('photo1')->nullable();
                $table->string('photo2')->nullable();
                $table->string('photo3')->nullable();
                $table->string('photo4')->nullable();
                $table->string('country')->default('Rwanda');
                $table->string('province');
                $table->string('district');
                $table->string('sector');
                $table->string('cell');
                $table->string('village');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};

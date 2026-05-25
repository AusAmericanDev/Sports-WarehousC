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
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2); // Holds prices up to $999,999.99
            $table->decimal('sale_price', 8, 2)->nullable(); // nullable means it can be left blank if not on sale
            $table->string('image_path'); // Stores the filename like 'soccerBall.jpg'
            $table->boolean('is_featured')->default(false); // Flags if it goes on the homepage

            // This connects the product to your categories table
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

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

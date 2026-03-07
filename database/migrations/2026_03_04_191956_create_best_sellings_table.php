<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_sellings');
    }

    public function up()
{
    Schema::create('best_sellings', function (Blueprint $table) {
            $table->id();
            $table->string('pet_type'); // cat or dog
            $table->string('product_name');
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity');
            $table->text('description')->nullable();
            $table->string('product_image'); // image path
            $table->timestamps();
        });
}
};

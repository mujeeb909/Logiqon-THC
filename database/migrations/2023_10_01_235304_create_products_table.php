<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Define the 'categories' table
        Schema::create('products', function (Blueprint $table) {
            // Auto-incremental primary key
            $table->id();
             // String column for the name of the category
            $table->string('name');
            // Decimal column for the price of the product
            // The '10' represents the total number of digits, and '2' represents the number of digits after the decimal point.
            $table->decimal('price', 10, 2);
            // Unsigned big integer column for the parent category ID, allowing null values
            //An unsignedBigInteger is a column that only allows positive integers (values greater than or equal to 0).
            $table->unsignedBigInteger('category_id');
             // Timestamps for created_at and updated_at columns
            $table->timestamps();

            // Foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

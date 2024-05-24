<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // Define the 'categories' table
        Schema::create('product_tag', function (Blueprint $table) {
            // Auto-incremental primary key
            $table->id();
            // Unsigned big integer column for the parent category ID, allowing null values
            //An unsignedBigInteger is a column that only allows positive integers (values greater than or equal to 0).
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');
            // Timestamps for created_at and updated_at columns
            $table->timestamps();

            // Foreign key constraint to establish the parent-child relationship
            // This references the 'id' column in the same 'categories' table
            // onDelete('cascade') means that if a parent category is deleted, its child categories will be deleted as well
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
}

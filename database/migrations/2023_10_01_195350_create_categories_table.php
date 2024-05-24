<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // Define the 'categories' table
        Schema::create('categories', function (Blueprint $table) {

           // Auto-incremental primary key
            $table->id();
            // String column for the name of the category
            $table->string('name');
            // Unsigned big integer column for the parent category ID, allowing null values
            //An unsignedBigInteger is a column that only allows positive integers (values greater than or equal to 0).
            $table->unsignedBigInteger('parent_id')->nullable();
            // Timestamps for created_at and updated_at columns
            $table->timestamps();

            // Foreign key constraint to establish the parent-child relationship
            // This references the 'id' column in the same 'categories' table
            // onDelete('cascade') means that if a parent category is deleted, its child categories will be deleted as well
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');

    }
}

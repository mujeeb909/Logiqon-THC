<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     /**
     * Relationship: Define a many-to-many relationship with the 'tags' table.
     * This method returns all tags associated with the current product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(ProductTag::class);
    }

     /**
     * Relationship: Define a many-to-one relationship with the 'categories' table.
     * This method returns the category to which the current product belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

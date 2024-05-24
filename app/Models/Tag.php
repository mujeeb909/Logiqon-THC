<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    /**
     * Relationship: Define a many-to-many relationship with the 'products' table.
     * This method returns all products associated with the current tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    protected $fillable = [
        'name',
        'user_id',

    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->using(ProductTag::class);
    }
}

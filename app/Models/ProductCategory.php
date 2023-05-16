<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name'];

    /**
     * @param array $category
     * @return ProductCategory
     */
    public static function create(array $category): ProductCategory
    {
        $newCategory = new static(['name' => $category['name']]);
        $newCategory->save();

        return $newCategory;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img_url'];

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

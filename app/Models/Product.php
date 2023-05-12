<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'category_id',
    ];

    public static function create(array $product): Product
    {
        $newProduct = new static([
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'categoryId' => number_format($product['categoryId'], 2, '.', '')
        ]);
        $newProduct->save();
        return $newProduct;
    }
}

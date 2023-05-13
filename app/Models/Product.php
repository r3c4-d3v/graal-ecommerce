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

    /**
     * Create a new product
     * @param array $product
     * @return Product
     */
    public static function create(array $product): Product
    {
        $newProduct = new static([
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => stringToCurrency($product['price']),
            'category_id' => (int)$product['category']
        ]);

        $newProduct->save();

        return $newProduct;
    }
}

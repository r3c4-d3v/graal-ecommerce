<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
            'price' => Util::stringToCurrency($product['price']),
            'category_id' => (int)$product['category']
        ]);

        $newProduct->save();

        return $newProduct;
    }
}

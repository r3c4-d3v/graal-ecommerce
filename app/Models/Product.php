<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'category_id'];

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
            'category' => number_format($product['category'], 2, '.', '')
        ]);
        $newProduct->save();
        return $newProduct;
    }
}

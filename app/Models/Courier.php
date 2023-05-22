<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'motorcycle_model',
        'license_plate',
        'phone',
        'email',
        'photo'
    ];

    public static function create(array $courier): Courier
    {
        $newCourier = new static([
            'firstname' => $courier['firstname'],
            'lastname' => $courier['lastname'],
            'motorcycle_model' => $courier['motorcycle_model'],
            'license_plate' => $courier['license_plate'],
            'email' => strtolower($courier['email']),
            'phone' => $courier['phone'],
            'photo' => $courier['photo'],
        ]);

        $newCourier->save();

        return $newCourier;
    }
}

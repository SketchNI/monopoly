<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'color',
        'price',
        'housing_cost',
        'charges',
    ];

    public function casts()
    {
        return [
            'charges' => 'json'
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'contact_id', 'street', 'city', 'province', 'country', 'postal_code'
    ];
}

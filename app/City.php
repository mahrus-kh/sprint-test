<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'province_id', 'city_name'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'province'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mahruskh
 * Date: 08/05/18
 * Time: 14:55
 */

return [

    // after set API_SOURCE=https://api.rajaongkir.com/starter/ on file .env
    // if not set return default => db and get data from database
    // set API_SOURCE must be not null

    'source' => env('API_SOURCE', 'db')
];
<?php
/**
 * Created by PhpStorm.
 * User: mahruskh
 * Date: 08/05/18
 * Time: 15:09
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class SetGuzzleClient
{
    public static function client()
    {
        return New Client(['base_uri' => env('API_SOURCE')]);
    }
}
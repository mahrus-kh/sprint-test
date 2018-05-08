<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Province;
use App\City;

class GetApiController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api-controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getProvincies();
        $this->getCities();
    }
    public function getProvincies()
    {
        $response = $this->client()->get('province', [
            'headers' => [
                'key' => '0df6d5bf733214af6c6644eb8717c92c'
            ]
        ]);
        $response = json_decode($response->getBody())->rajaongkir->results;

        foreach ($response as $key => $value) {
            Province::create([
                'province' => $value->province
            ]);
        }
        return TRUE;
    }

    public function getCities()
    {
        $response = $this->client()->get('city', [
            'headers' => [
                'key' => '0df6d5bf733214af6c6644eb8717c92c'
            ]
        ]);
        $response = json_decode($response->getBody())->rajaongkir->results;

        foreach ($response as $key => $value){
            City::create([
                'province_id' => $value->province_id,
                'city_name' => $value->city_name
            ]);
        }
        return TRUE;
    }

    public function client()
    {
        return New Client(['base_uri' => 'https://api.rajaongkir.com/starter/']);
    }
}

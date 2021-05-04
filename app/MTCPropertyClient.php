<?php

namespace App;

use GuzzleHttp\Client;

class MTCPropertyClient extends Client
{
    public function allProperties($callback)
    {
        $json = $this->getPage(1);
        $lastPage = $json['last_page'];
        for ($i = 1; $i < $lastPage; $i++) {
            $callback($this->getPage($i));
        }
    }

    public function getPage(int $page = 1): array
    {
        $response = $this->get('properties?page[number]=' . $page);
        $data = $response->getBody()->getContents();
        return json_decode($data, true);
    }
}

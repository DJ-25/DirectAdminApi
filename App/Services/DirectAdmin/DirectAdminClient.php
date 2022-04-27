<?php

namespace App\Services\DirectAdmin;

use GuzzleHttp\Client;

class DirectAdminClient
{
    public function getUsersList(): array
    {
        $client = new Client([
            'base_uri' => 'http://49.12.245.225:2222'
        ]);
        
        $response = $client->get('/CMD_API_SHOW_ALL_USERS');
        $result = $response->getBody()->getContents();
        $code = $response->getStatusCode();

        //@todo check status code, if other than 200, show error message
        return $result;
    }

    public function getUsersListExample(): array
    {
        return [
            'user1',
            'user2',
            'user3'
        ];
    }
} 
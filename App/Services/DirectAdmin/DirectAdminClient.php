<?php

namespace App\Services\DirectAdmin;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class DirectAdminClient
{
    protected $config;

    public function __construct()
    {
        $this->config = require_once('config.php');
    }

    private function call(string $endpoint, string $method = 'GET', array $options = [])
    {
        $client = new Client([
            'base_uri' => $this->config['DIRECT_ADMIN_HOST'],
            'auth' => [
                $this->config['DIRECT_ADMIN_LOGIN'], 
                $this->config['DIRECT_ADMIN_PASSWORD']
            ]
        ]);

        try
        {
            $response = $client->request($method, $endpoint.'?json=yes', $options);
            $stringResponse = $response->getBody()->getContents();
        }
        catch (ServerException $exception)
        {
            $stringResponse = $exception->getResponse()->getBody()->getContents();
        }

        return json_decode($stringResponse, true);
    }

    public function getUsersList()
    {
        return $this->call('CMD_API_SHOW_ALL_USERS');
    }

    public function getPackages()
    {
        return $this->call('CMD_API_PACKAGES_USER');
    }

    public function createUser(array $userData) 
    {
        return $this->call('CMD_API_ACCOUNT_USER', 'POST', ['form_params' => $userData]);
    }

    public function deleteUser(string $username)
    {
        return $this->call('CMD_API_SELECT_USERS', 'POST', [
            'form_params' => [
                'confirmed' => 'Confirm',
                'delete' => 'yes',
                'select0' => $username
            ]
        ]);
    }

    public function getUserDetails(string $username)
    {
        return $this->call('CMD_API_SHOW_USER_CONFIG', 'GET', ['user' => $username]);
    }

    public function editUserDetails(array $editData)
    {
        return $this->call('CMD_API_MODIFY_USER', 'POST', ['form_params' => $editData]);
    }

    public function updateUserPassword(array $editData)
    {
        return $this->call('CMD_CHANGE_EMAIL_PASSWORD', 'POST', ['form_params' => $editData]);
    }
} 

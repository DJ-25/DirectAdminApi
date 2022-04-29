<?php

namespace App\Controllers;


class DirectAdminController extends BaseController
{
    public function showUsersList()
    {
        $userList = $this->directAdmin->getUsersList();

        return $this->view('list', ['users' => $userList]);
    }

    public function showCreateUserForm()
    {
        return $this->view('show_form', [
            'packages' => $this->directAdmin->getPackages()
        ]);
    }

    public function createUser(array $formData) 
    {
        $createResponse = $this->directAdmin->createUser($formData);
        
        return $this->showResponseMessages($createResponse);
    }

    public function deleteUser(string $username) 
    {
        $createResponse = $this->directAdmin->deleteUser($username);
        
        return $this->showResponseMessages($createResponse);
    }

    public function showUserDetails(string $username)
    {
        return $this->view('details', [
            'details' => $this->directAdmin->getUserDetails($username),
            'packages' => $this->directAdmin->getPackages(),
            'username' => $username
        ]);
    }

    public function updateUserDetails(array $data)
    {
        $response = $this->directAdmin->editUserDetails($data);
        return $this->showResponseMessages($response);
    }

    public function updateUserPassword(array $data)
    {
        $response = $this->directAdmin->updateUserPassword($data);
        return $this->showResponseMessages($response);
    }
}
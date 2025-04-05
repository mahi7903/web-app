<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserRegister extends BaseController
{
    // Display the registration form
    public function index()
    {
        return view('register.php');
    }

    // Handle the form submission (POST)
    public function submit()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $name = $this->request->getPost('name');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();

            $userData = [
                'email' => $email,
                'name' => $name,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insertedId = $userModel->insert($userData);

            if ($insertedId) {
                return redirect()->to('http://localhost/');
            } else {
                return redirect()->back()->with('error', 'Failed to register. Please try again.');
            }
        }
    }
}
print('hello');
<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    // Display the registration form
    public function index()
    {
        return view('register.php');
    }

    // Handle the form submission (POST)
    public function submit()
{
    // Check if POST request
    if ($this->request->getMethod() == 'post') {
        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');

        // Load UserModel
        $userModel = new UserModel();

        // Prepare the data for insertion
        $userData = [
            'email' => $email,
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hash password
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Try to insert data into the database
        $insertedId = $userModel->insert($userData);

        // Check if insert was successful
        if ($insertedId) {
            return redirect()->to('http://localhost/'); // Redirect on success
        } else {
            // If there was an error, go back and show an error message
            return redirect()->back()->with('error', 'Failed to register. Please try again.');
        }
    }
}
}

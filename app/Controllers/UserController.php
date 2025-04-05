<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
    // Show register form
    public function register()
    {
        return view('register');
    }

    // Show login form
    public function login()
    {
        return view('login');
    }

    // Register User
    public function registerUser()
    {
        helper(['form']);
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $model->save($data);

            // Redirect to login page with success message
            return redirect()->to('/login')->with('success', 'Registration successful! Please sign in.');
        } else {
            return view('register', [
                'validation' => $this->validator
            ]);
        }
    }

    // Login User
    public function loginUser()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set user session
            session()->set([
                'user_id'   => $user['id'],
                'user_name' => $user['name'],
                'logged_in' => true
            ]);

            // Redirect to homepage with flash message
            return redirect()->to('/')->with('message', 'You are logged in!');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    // Logout User
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You are logged out.');
    }
}

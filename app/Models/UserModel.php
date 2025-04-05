<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // <-- Changed table name to users
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'created_at'];

    // Save user only if they don't already exist
    public function saveIfNotExists($data)
    {
        $existingUser = $this->where('email', $data['email'])->first();

        if (!$existingUser) {  
            $this->insert($data);
        }
    }
}